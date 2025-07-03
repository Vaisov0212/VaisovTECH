<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id'=>1,
            'roleName'=>"user",
        ]);
         Role::create([
            'id'=>2,
            'roleName'=>"moderator",
        ]);
         Role::create([
            'id'=>3,
            'roleName'=>"admin",
        ]);
         Role::create([
            'id'=>4,
            'roleName'=>"sudo",
        ]);
    }
}
