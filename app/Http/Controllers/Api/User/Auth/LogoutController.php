<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Services\Api\User\Auth\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use ApiResponse;

    public function __construct(protected AuthService $authService)
    {
    }

    public function __invoke()
    {
        $this->authService->logout();
        return $this->apiresponse('logout successfully ', 200);
    }
}
