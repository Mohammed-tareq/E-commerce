<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class RoleRepository
{

    public function getRoles()
    {
        return Role::select('id','name','permissions')->paginate(8);
    }
    public function createRole($request)
    {
        $role = Role::create([
            'name' =>[
                'ar' => $request->name['ar'],
                'en' => $request->name['en']
            ],
            'permissions' => $request->permissions
        ]);
        return $role;
    }

    public function getRole($id)
    {
        $role = Role::whereId($id)->first();
        return $role;
    }

    public function updateRole($request,$id)
    {
        $role = Role::find($id);
        $role->update([
            'name' =>[
                'ar' => $request->name['ar'],
                'en' => $request->name['en']
            ],
            'permissions' => $request->permissions
        ]);
        return $role;
    }


    public function deleteRole($id)
    {
       $role = Role::find($id)->delete();

       return $role;
    }

}