<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Hash;

class PasswordRepository
{
    public function __construct(protected Otp $otp)
    {

    }

    public function getAdminByEmail($email)
    {
        $admin = Admin::whereEmail($email)->first();
        return $admin;

    }

    public function verifyOtp($email, $otp)
    {
        $otpCheck = $this->otp->validate($email, $otp);
        return $otpCheck->status;
    }

    public function resetPassword($email,$password)
    {
        $admin = self::getAdminByEmail($email);

        $admin->update([
            'password'=>Hash::make($password)
        ]);
        return $admin;
    }

}