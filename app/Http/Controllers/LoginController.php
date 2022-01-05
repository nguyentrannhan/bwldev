<?php

namespace App\Http\Controllers;


class LoginController extends Controller
{
    protected $authorizationURL = "https://discord.com/api/oauth2/authorize";

    public function login()
    {
        $clientId = env("DISCORD_CLIENT_ID");
        $scope = "identify";
        $responseType = "code";
        $redirectURI = env("DISCORD_REDIRECT_URI");
        $discordLink = "$this->authorizationURL?client_id=$clientId&redirect_uri=$redirectURI&response_type=$responseType&scope=$scope";
        return view('login', compact('discordLink'));
    }
}
