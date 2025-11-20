<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class LoginRepository
{
    public function login($credentials , $remember , string $guard )
    {
        return Auth::guard($guard)->attempt($credentials , $remember);
    }

    public function logout(string $guard)
    {
        Auth::guard($guard)->logout();
    }

}
