<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\UserRequest;
use App\Services\Dashboard\UserService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public function __construct(protected UserService $userService)
    {

    }

    public static function middleware()
    {
        return [
            new Middleware('can:users'),
        ];
    }

    public function index()
    {
        return view('dashboard.user.index');
    }

    public function getUsers()
    {
        return $this->userService->getUsers();
    }

    public function createUser(UserRequest $request)
    {
        $data = $request->only('name', 'phone', 'password', 'email', 'city_id', 'country_id', 'governorate_id', 'image', 'status');
        if (!$this->userService->createUser($data)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 400);
        }

        return response()->json([
            'status' => true,
            'messages' => __('dashboard.operation_success')
        ], 201);
    }

    public function changeStatus($id)
    {
        if (!$this->userService->changeStatus($id)) {
            return response()->json([
                'status' => false,
                'message' => __('dashboard.operation_error')
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => __('dashboard.operation_success')
        ]);
    }

    public function deleteUser($id)
    {

        if(!$this->userService->deleteUser($id))
        {
            return response()->json([
                'status' => false,
                'messages' => __('dashboard.error_order_message')
            ],400);
        }
        return response()->json([
            'status' => true,
            'messages' => __('dashboard.operation_success')
        ],200);
    }
}
