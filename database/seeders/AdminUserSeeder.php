<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'group three',
            'email' => 'groupthree@se.com',
            'password' => Hash::make('password'), // You can use the Hash::make() function as well
        ]);

        // Attach the 'administrator' role to the admin user
        $role = Role::where('role_name', 'administrator')->first();
        if ($role) {
            $admin->roles()->attach($role->id);
        }

    }
}
