<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('website.home.home', compact('sliders'));
    }


}

