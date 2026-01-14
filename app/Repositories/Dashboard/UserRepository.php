<?php

namespace App\Repositories\Dashboard;

use App\Models\User;

class UserRepository
{

    public function getUsers()
    {
            return User::with('country','governorate','city' , 'orders')->latest()->get();
    }

    public function getUser($id)
    {
        return User::with('orders')->find($id);
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function updateUser($user, $data)
    {
        return $user->update($data);
    }

    public function deleteUser($user)
    {
        return $user->delete();
    }

    public function changeStatus($user)
    {
        return $user->update([
            'status' => !$user->getRawOriginal('status')
        ]);
    }
}