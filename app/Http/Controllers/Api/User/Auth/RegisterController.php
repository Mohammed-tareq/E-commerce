<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\RegisterRequest;
use App\Services\Api\User\Auth\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use ApiResponse;

    public function __construct(protected AuthService $authService)
    {
    }

    public function __invoke(RegisterRequest $request)
    {
        $userData = $request->validated();
        if (!$data = $this->authService->register($userData)) {
            return $this->apiresponse('Failed to register', 400);
        }
        return $this->apiresponse('Registered successfully', 200, $data);
    }
}
