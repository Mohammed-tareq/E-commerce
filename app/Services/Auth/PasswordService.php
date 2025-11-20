<?php

namespace App\Services\Auth;

use App\Notifications\Otp\SendOtpEmail;
use App\Repositories\Auth\PasswordRepository;

class PasswordService
{
    public function __construct(
        protected PasswordRepository $passwordRepository
    )
    {
    }

    public function sendOtp($email)
    {
        $admin = $this->passwordRepository->getAdminByEmail($email);
        if ($admin) {
            $admin->notify(new SendOtpEmail());
        }

    }

    public function verifyOtp($data)
    {
        return $this->passwordRepository->verifyOtp($data['email'], $data['otp']);
    }

    public function resetPassword($email, $password)
    {
        return $this->passwordRepository->resetPassword($email, $password);
    }

}