<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller implements HasMiddleware
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    protected $redirectTo = '/home';


    public static function middleware()
    {
        return [
            new Middleware('guest:web', ['except' => 'logout']),
            new Middleware('auth:web', ['only' => 'logout'])
        ];
    }

    public function showLoginForm()
    {
        return view('website.auth.login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email|max:50',
            'password' => 'required|string|min:6|max:50',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->route('website.user-profile');
    }


    public function logOut(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        Session::flash('success', __('dashboard.operation_success'));
        return redirect()->route('website.login');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }


}
