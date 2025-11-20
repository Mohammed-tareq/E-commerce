<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LoginController extends Controller implements HasMiddleware
{
    public function __construct(
        protected LoginService $loginService
    )
    {
    }

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
        $request->merge([
            'remember_me' => $request->has('remember_me') ? true : false,
        ]);
        $credential = $request->only(['email', 'password']);

        if ($this->loginService->login($credential, $request->remember_me, 'admin')) {
            return redirect()->intended(route('dashboard.welcome'));
        }
        return redirect()->back()->withErrors(['email' => __('auth.invalid_credentials')]);
    }

    public function logout(Request $request)
    {
        $this->loginService->logout('admin');
        return redirect()->route('dashboard.login');
    }
}
