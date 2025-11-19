<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\Otp\SendOtpEmail;
use Illuminate\Http\Request;

class ForgetpasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('dashboard.auth.password.email-verify');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = Admin::where('email',$request->email)->firstOr(
            fn()=>  null
        );
        if($user)
        {
            $user->notify(new SendOtpEmail());
        }
        return redirect()->route('dashboard.verify.email.show',$request->email);
    }
}
