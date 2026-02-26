<?php

namespace App\Services\Api\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function register($data)
    {
        $user = User::create($data);
        if (!$user) return false;
        $token = $user->createToken('user-token', ['*'], now()->addWeek())->plaintextToken;
        return [
            'token' => $token,
            'user' => $user
        ];

    }

    public function login($data)
    {
        $user = User::whereEmail($data['email'])->first();
        if (!$user || Hash::check($data['password'], $user->password)) {
            return false;
        }
        $token = $user->createToken('user-token', ['*'], now()->addWeek())->plainTextToken;
        return [
            'token' => $token,
            'user' => $user
        ];
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return true;
    }

}