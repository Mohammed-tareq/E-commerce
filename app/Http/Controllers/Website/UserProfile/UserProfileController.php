<?php

namespace App\Http\Controllers\Website\UserProfile;

use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('website.user-profile.user-profile');
    }

}
