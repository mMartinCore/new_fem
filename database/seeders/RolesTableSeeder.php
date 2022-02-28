<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'name' => 'Super',
                'guard_name' => 'web',
             ],
             [
                'id'    => 2,
                'name' => 'Admin',
                'guard_name' => 'web',
             ],
             [
                'id'    => 3,
                'name' => 'Customer',
                'guard_name' => 'web',
             ],
         
        ];


        Role::insert($roles);
    }
}
