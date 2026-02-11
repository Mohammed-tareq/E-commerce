<?php

namespace App\Http\Controllers\Website\Contactus;

use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('website.pages.contact-us');
    }
}
