<?php

namespace Database\Seeders;

use App\Models\User;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\RolesTableSeeder;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RoleUserTableSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\Teameeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
  
        $this->call([
            UsersTableSeeder::class,  
            PermissionsTableSeeder::class,
            RolesTableSeeder::class, 
            RoleUserTableSeeder::class,
            Teamseeder::class,
        ]);
    }
}
