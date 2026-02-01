<?php

namespace App\Http\Controllers\Website\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('website.pages.cart');
    }
}
