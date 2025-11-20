<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPassword;
use App\Services\Auth\PasswordService;


class ResetpasswordController extends Controller
{
    public function __construct(protected PasswordService $passwordService){}
    public function showResetPasswordForm($email)
    {
        return view('dashboard.auth.password.reset-pass',compact('email'));
    }

    public function ResetPassword(ResetPassword $request)
    {
        if(!$this->passwordService->resetPassword($request->email,$request->password))
        {
            return redirect()->back()->withErrors(['password' => __('auth.try_again')]);
        }
        return redirect()->route('dashboard.login');
    }
}
