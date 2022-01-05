<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OAuthController extends Controller
{
    protected $tokenURL = "https://discord.com/api/oauth2/token";
    protected $apiURLBase = "https://discord.com/api/users/@me";
    protected $tokenData = [
        "client_id" => null,
        "client_secret" => null,
        "grant_type" => "authorization_code",
        "code" => null,
        "redirect_uri" => null,
        "scope" => "identify"
    ];

    public function confirmLogin(Request $request)
    {
        if ($request->missing("code") && $request->missing("access_token")) {
            return redirect()->route("login");
        }

        $this->tokenData["client_id"] = env("DISCORD_CLIENT_ID");
        $this->tokenData["client_secret"] = env("DISCORD_CLIENT_SECRET");
        $this->tokenData["code"] = $request->get("code");
        $this->tokenData["redirect_uri"] = env("DISCORD_REDIRECT_URI");

        $client = new Client();
        try {
            $accessTokenData = $client->post($this->tokenURL, ["form_params" => $this->tokenData]);
            $accessTokenData = json_decode($accessTokenData->getBody());
        } catch (GuzzleException $e) {
            Log::error($e);
            return redirect()->route("login");
        }

        $userData = Http::withToken($accessTokenData->access_token)->get($this->apiURLBase);
        if ($userData->clientError() || $userData->serverError()) {
            return redirect()->route("login");
        };

        $userData = json_decode($userData);
        $user = $this->saveUser($userData, $accessTokenData);
        if ($user) {
            Auth::login($user);
            return redirect()->route("index");
        }
        return redirect()->route("login");
    }

    public function saveUser($userData, $accessTokenData)
    {
        $user = User::where('id', $userData->id)->first();
        if ($user) {
            $user->update([
                'username' => $userData->username,
                'discriminator' => $userData->discriminator,
                'avatar' => $userData->avatar,
                'verified' => $userData->verified,
                'locale' => $userData->locale,
                'mfa_enabled' => $userData->mfa_enabled,
                'refresh_token' => $accessTokenData->refresh_token,
            ]);
            return $user;
        }
        return null;
    }
}
