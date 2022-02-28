<?php

namespace Database\Seeders;

 
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
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

        Permission::insert($permissions);
    }
}
