<?php

namespace App\Http\Controllers;


use App\Models\Image;
use Carbon\Carbon;
use DateTime;

class MainController extends Controller
{
    public function show()
    {
        $images = Image::with('reactions')->orderBy('createdTimestamp')->paginate(50);
//        foreach ($images as $image){
//            var_dump($image->createdTimestamp);
//            var_dump((new DateTime())->setTimestamp($image->createdTimestamp->__toString() / 1000)->format('d/m/Y H:i'));

//            var_dump((new DateTime())->setTimestamp( 1640623557301 / 1000)->format('d/m/Y H:i'));
//        }
        return view('main', compact('images'));
    }
}
