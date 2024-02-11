<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // administrator role
        Role::create([
            'role_name' => 'administrator',
        ]);

        // proprietor
        Role::create([
            'role_name' => 'proprietor',
        ]);

        // cutomer role
        Role::create([
            'role_name' => 'customer',
        ]);
    }
}
