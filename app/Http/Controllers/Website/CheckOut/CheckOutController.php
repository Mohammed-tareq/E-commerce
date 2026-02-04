<?php

namespace App\Http\Controllers\Website\CheckOut;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Checkout\CheckOutRequest;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('website.pages.check-out');
    }

    public function checkout(CheckOutRequest $request)
    {

    }
}
