<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected const PAGE_LIMIT = 10;

    public function index(Request $request)
    {
        $messages = Message::with([
            'reactions', 'user', 'comments' => function ($query) {
                $query->orderBy('createdTimestamp', 'desc');
            }
        ])->orderBy('createdTimestamp', 'desc')->get();
        foreach ($messages as $key => $message) {
            if (empty($message->links)) {
                unset($messages[$key]);
            }
        }
        $mediaMessages = $messages->paginate(self::PAGE_LIMIT);

        if ($request->ajax()) {
            $view = view('data', ['messages' => $mediaMessages])->render();
            return response()->json(['html' => $view]);
        }

        return view('index', ['messages' => $mediaMessages]);
    }
}
