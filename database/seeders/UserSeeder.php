<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name'=>"john",
            'email'=>"john@gmail.com",
            'password'=>Hash::make('test12345'),
            'role_id'=>1

        ]);
          User::create([
            'name'=>"john2",
            'email'=>"john2@gmail.com",
            'password'=>Hash::make('test12345'),
            'role_id'=>4

        ]);

    }
}
