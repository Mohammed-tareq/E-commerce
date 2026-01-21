<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HomeController extends Controller implements HasMiddleware
{


    public static function middleware()
    {
        return[
            new Middleware(['auth'])
        ];
    }


    public function index()
    {
        return view('home');
    }
}
