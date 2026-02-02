<?php

namespace App\Http\Controllers\Website\WishList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishLastController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('website.pages.wish-list');
    }
}
