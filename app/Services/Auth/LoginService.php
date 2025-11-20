<?php

namespace App\Services\Auth;

use App\Repositories\Auth\LoginRepository;

class LoginService
{
    public function __construct(
        protected LoginRepository $loginRepository
    ) {}

    public function login($credentials , $remember , string $guard )
    {
        return $this->loginRepository->login($credentials , $remember , $guard);

    }

    public function logout(string $guard)
    {
        return $this->loginRepository->logout($guard);
    }

}