<?php

namespace App\Http\Controllers\Website\Shop;

use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        return view('website.pages.shop');
    }
}
