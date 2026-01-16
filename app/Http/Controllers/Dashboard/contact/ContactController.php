<?php

namespace App\Http\Controllers\Dashboard\contact;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ContactController extends Controller implements HasMiddleware
{
    public function __construct()
    {

    }

    public static function middleware()
    {
        return[
          new Middleware('can:contact')
        ];
    }

    public function index()
    {
        return view('dashboard.contact.index');
    }
}
