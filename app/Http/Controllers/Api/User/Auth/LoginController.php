<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\LoginRequest;
use App\Services\Api\User\Auth\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use ApiResponse;

    public function __construct(protected AuthService $authService)
    {
    }

    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated()->only('email', 'password');
        $data = $this->authService->login($credentials);
        if (!$data) $this->apiresponse('Invalid credentials', 401);

        return $this->apiresponse('login successfully ', 200, $data);

    }
}
