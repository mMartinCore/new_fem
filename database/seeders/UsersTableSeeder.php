<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Webpatser\Uuid\Uuid;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                // 'uuid'           =>Uuid::generate()->string, 
                'email'          => 'mlm@vorkkloc.com',
                'name'           =>'Marvin Martin',
                'country_id'               =>1,                
                'password'       => bcrypt('password'),
                'remember_token' => null,  
            ],
        ];

        User::insert($users);
    }
}
