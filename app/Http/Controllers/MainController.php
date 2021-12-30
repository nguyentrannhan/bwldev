<?php

namespace App\Http\Controllers;


use App\Models\Image;

class MainController extends Controller
{
    public function show()
    {
        $images = Image::with('reactions')->orderBy('createdTimestamp')->paginate(50);
        return view('main', compact('images'));
    }
}
