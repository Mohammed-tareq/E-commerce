<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\RoleRepository;

class RoleService
{
    public function __construct(protected RoleRepository $roleRepository){}

    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }
    public function createRole($request)
    {
        return $this->roleRepository->createRole($request);
    }

    public function getRole($id)
    {
        return $this->roleRepository->getRole($id);
    }

    public function updateRole($request,$id)
    {
        return $this->roleRepository->updateRole($request,$id);
    }

    public function deleteRole($id)
    {
        $role = self::getRole($id);

       if(!$role || $role->admins()->count() > 0)
       {
           return false;
       }

        return $this->roleRepository->deleteRole($id);
    }

}