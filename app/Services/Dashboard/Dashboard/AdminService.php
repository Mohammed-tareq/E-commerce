<?php

namespace App\Services\Dashboard\Dashboard;

use App\Repositories\Dashboard\AdminRepository;

class AdminService
{
    public function __construct(protected AdminRepository $adminRepository)
    {
    }

    public function getAdmins()
    {
        return $this->adminRepository->getAdmins();
    }

    public function getAdmin($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            abort(404);
        }
        return $admin;
    }

    public function storeAdmin($data)
    {
        $admin = $this->adminRepository->storeAdmin($data);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    public function UpdateAdmin($data, $id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            abort(404);
        }
        if(empty($data['password']))
        {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        $adminUpadated = $this->adminRepository->updateAdmin($data, $admin);
        if (!$adminUpadated) {
            return false;
        }
        return $adminUpadated;

    }

    public function deleteAdmin($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
           abort(404);
        }
        return $this->adminRepository->deleteAdmin($admin);
    }

    public function changeStatus($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
           abort(404);
        }
        return $this->adminRepository->changeStatus($admin);
    }

}