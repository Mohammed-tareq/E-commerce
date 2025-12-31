<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminRepository
{
    public function getAdmins()
    {
        $admins = Admin::select('id', 'name', 'email', 'role_id', 'status', 'created_at')->latest()->paginate(8);;
        return $admins;
    }

    public function getAdmin($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }

    public function storeAdmin($data)
    {
        $admin = Admin::create($data);
        return $admin;

    }

    public function updateAdmin($data, $admin)
    {
        $admin->update($data);
        return $admin;

    }

    public function deleteAdmin($admin)
    {
        $admin->delete();
        return $admin;

    }

    public function changeStatus($admin)
    {
       $admin->update(['status' => !$admin->getRawOriginal('status')]);
        return $admin;
    }

}