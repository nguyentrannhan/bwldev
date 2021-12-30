<?php

namespace App\Http\Controllers;


use App\Models\Image;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(Request $request)
    {
        $images = Image::with('reactions')->orderBy('createdTimestamp', 'desc')->paginate(10);

        if ($request->ajax()) {
            $view = view('data', compact('images'))->render();
            return response()->json(['html' => $view]);
        }

        return view('index', compact('images'));
    }
}
