<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('name'); 
            $table->boolean('personal_team');  
            $table->string('domain')->unique();
            $table->string('logo_title')->nullable();
            $table->string('carousel_txt_1')->nullable();
            $table->string('carousel_txt_2')->nullable();
            $table->string('carousel_text_3')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('theme_color_hover')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('fackbook_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content_link')->nullable();
            
            $table->string('prefix')->nullable();
            $table->string('content_title')->nullable();
            $table->integer('max_number')->nullable();
            $table->integer('virtual_number')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
