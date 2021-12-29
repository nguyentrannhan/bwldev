<?php

namespace App\Http\Controllers;


use App\Models\Image;

class MainController extends Controller
{
    public function show()
    {
        $images = Image::all();
        return view('main',compact('images'));
    }
}
