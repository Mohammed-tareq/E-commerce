<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [];

        foreach(config('permissions_en') as $permission => $value){
            $permissions[] = $permission ;
        }

        Role::create([
            'name' => [
                'en' => 'admin',
                'ar' => 'مدير'
            ],
            'permissions' => $permissions
        ]);
    }
}
