<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@g.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
    }
}
