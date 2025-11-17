<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard.welcome');
        }
        return redirect()->back()->withErrors(['email' => __('auth.invalid_credentials')]);
    }
}
