<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CheckEmailAndOtp;
use App\Services\Auth\PasswordService;


class VerifyEmailController extends Controller
{


    public function __construct(protected PasswordService $passwordService)
    {
    }

    public function showVerifyEmailForm($email)
    {
        return view('dashboard.auth.password.confirm-email', compact('email'));
    }

    public function verifyOtp(CheckEmailAndOtp $request)
    {
        $data = $request->only('email', 'otp');

        if (!$this->passwordService->verifyOtp($data)) {
            return redirect()->back()->withErrors(['otp' => __('auth.try_again')]);
        }

        return redirect()->route('dashboard.reset.password.show', $request->email);

    }
}
