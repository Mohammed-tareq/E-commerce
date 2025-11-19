<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{

    public $otp;

    Public function __construct()
    {
        $this->otp = new Otp();

    }
    public function showVerifyEmailForm($email)
    {
        return view('dashboard.auth.password.confirm-email',compact('email'));
    }
    public function verifyOtp(Request $request )
    {
        $request->validate([
            'otp'=>'required|numeric',
            'email' =>'required|email|string'
        ]);

       $user = Admin::whereEmail($request->email)->first();
       if(!$user)
       {
           return redirect()->back()->withErrors(['otp'=>__('auth.invalid_credentials')]);
       }

       $otpCheck = $this->otp->validate($request->email, $request->otp);
       if($otpCheck->status === false)
       {
           return redirect()->back()->withErrors(['otp'=>__('auth.invalid_credentials')]);
       }

       return redirect()->route('dashboard.reset.password.show',$request->email);

    }
}
