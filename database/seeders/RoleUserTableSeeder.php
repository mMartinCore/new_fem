<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        $user=User::findOrFail(1);//->roles()->sync(1);
        $role = Role::findOrFail(1);
        $permission = Permission::findOrFail(1);
        $role->givePermissionTo($permission);
        $user->assignRole($role); 
        $user->givePermissionTo( $permission->name );


       
        $role = Role::findOrFail(2);
        $permission = Permission::findOrFail(2); 
        $role->givePermissionTo($permission); 

        $role = Role::findOrFail(3);
        $permission = Permission::findOrFail(3); 
        $role->givePermissionTo($permission); 

        
    }
}
