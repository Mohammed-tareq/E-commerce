<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetpasswordController extends Controller
{
    public function showResetPasswordForm($email)
    {
        return view('dashboard.auth.password.reset-pass',compact('email'));
    }

    public function ResetPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email|string|exists:admins,email',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required'
        ]);

        $user = Admin::whereEmail($request->email)->first();

        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('dashboard.login');
    }
}
