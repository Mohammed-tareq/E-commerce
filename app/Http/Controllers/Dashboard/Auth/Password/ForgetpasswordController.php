<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CheckEmailAndOtp;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\Otp\SendOtpEmail;
use App\Services\Auth\PasswordService;
use Illuminate\Http\Request;

class ForgetpasswordController extends Controller
{
    public function __construct(
        protected PasswordService $passwordService
    )
    {
    }

    public function showForgetPassword()
    {
        return view('dashboard.auth.password.email-verify');
    }

    public function sendOtp(CheckEmailAndOtp $request)
    {

        $this->passwordService->sendOtp($request->email);
        return redirect()->route('dashboard.verify.email.show', $request->email);
    }
}
