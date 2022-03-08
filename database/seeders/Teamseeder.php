<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Country;
use Illuminate\Database\Seeder;

class Teamseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::factory()->create([
            'name'=>'England', 
            'short_name'=>'ENG',
            'icon'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Flag_of_England.svg/1200px-Flag_of_England.svg.png'
           
        ]);
        Country::factory()->create([
            'name'=> 'Jamaica',
            'short_name'=>'JAM',
            'icon'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Jamaica.svg/1200px-Flag_of_Jamaica.svg.png'
         ]);
         Country::factory()->create([
            'name'=>  'Barbado'
            ,'short_name'=>'BAR',
            'icon'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Jamaica.svg/1200px-Flag_of_Jamaica.svg.png'
         ]);
       
        



            Team::factory()->create([
            'domain'=>'super',
            'logo_title'=>'Vorkkloc',
            'theme_color'   =>'#00bcd4',
            'theme_color_hover'   =>'#00bcd4',
            'instagram_link'    =>'https://www.instagram.com/vorkkloc/',
            'fackbook_link'    =>'https://www.facebook.com/vorkkloc/',
            'whatsapp_link'    =>'https://wa.me/2348102030303',
            'twitter_link'    =>'https://twitter.com/vorkkloc',
            'content_link'      =>'https://www.vorkkloc.com',
            'content_title'   =>'Vorkkloc',
            'content'      =>'Vorkkloc is a platform that helps you to grow your business. We help you to grow your business by providing you with the best services and products.',
            'personal_team'   =>true,
            'country_id'=>1,   
            'user_id'   =>1,
            'carousel_txt_1'        =>'Vorkkloc is a platform that helps you to grow your business. We help you to grow your business by providing you with the best services and products.',
            'carousel_txt_2'    =>'Vorkkloc is a platform that helps you to grow your business. We help you to grow your business by providing you with the best services and products.',
            // 'carousel_txt_3'    =>'Vorkkloc is a platform that helps you to grow your business. We help you to grow your business by providing you with the best services and products.',
            'max_number'    =>'10',
            'prefix'    =>'KK'
        ]);
    }
}
