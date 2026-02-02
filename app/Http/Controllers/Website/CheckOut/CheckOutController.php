<?php

namespace App\Http\Controllers\Website\CheckOut;

use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('website.pages.check-out');
    }
}
