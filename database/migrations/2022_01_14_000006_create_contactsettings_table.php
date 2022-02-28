<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsettingsTable extends Migration
{
    public function up()
    {
        Schema::create('contactsettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_1')->unique();
            $table->string('email_2')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('phone_no_1')->nullable();
            $table->string('phone_no_2')->nullable();
            $table->longText('google_map_1')->nullable();
            $table->longText('google_map_2')->nullable();
            $table->string('contact_title')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactsettings');
    }
}
