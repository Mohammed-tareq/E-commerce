<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth:admin', only: ['logout']),
            new Middleware('guest:admin', only: ['showLogin', 'login'])
        ];
    }

    public function showLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $request->merge([
            'remember_me' => $request->has('remember_me') ? true : false,
        ]);

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $request->remember_me)) {
            return redirect()->route('dashboard.welcome');
        }
        return redirect()->back()->withErrors(['email' => __('auth.invalid_credentials')]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login');
    }
}
