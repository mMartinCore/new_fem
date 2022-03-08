<?php

namespace Database\Seeders;

use App\Models\User;


 
use App\Models\Category;
use App\Models\Packagestatus;
use Database\Seeders\Teameeder;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\RolesTableSeeder;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RoleUserTableSeeder;
use Database\Seeders\PermissionsTableSeeder;

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


        Packagestatus::factory()->create([
            'name'=> 'Pending',
            'description'=> 'Pending',
         ]);

            Packagestatus::factory()->create([
                'name'=> 'Received',
                'description'=> 'Received',
            ]);

            Packagestatus::factory()->create([
                'name'=> 'Intransit',
                'description'=> 'Intransit',
            ]);

            Packagestatus::factory()->create([
                'name'=> 'Pending Quote',
                'description'=> 'Pending Quote',
            ]);

            Packagestatus::factory()->create([
                'name'=> 'Ready for Pickup',
                'description'=> 'Ready for Pickup',
            ]);


            Packagestatus::factory()->create([
                'name'=> 'Delivered',
                'description'=> 'Delivered',
            ]);


            

        Category::factory()->create([
            'name'=> 'Food',
            'description'=>'Food',                
         ]);

         Category::factory()->create([
            'name'=> 'Clothes',
            'description'=>'Clothes',

         ]);

          Category::factory()->create([
                'name'=> 'Electronics',
                'description'=>'Electronics',
    
            ]);

          Category::factory()->create([
                'name'=> 'Furniture',
                'description'=>'Furniture',
    
            ]);

          Category::factory()->create([
                'name'=> 'Books',
                'description'=>'Books',
    
            ]);

            Category::factory()->create([
                    'name'=> 'Sports',
                    'description'=>'Sports',
        
                ]);








    }
}
