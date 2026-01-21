<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('website.home');
    }

}

