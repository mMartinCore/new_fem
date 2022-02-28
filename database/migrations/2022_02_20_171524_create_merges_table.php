<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merges', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable(); 
            $table->string('name')->nullable();     
            $table->dateTime('package_status_date')->nullable();                      
            $table->foreignId('packagestatus_id')->nullable(); 
            $table->foreignId('payment_id')->nullable(); 
            $table->string('prefix')->nullable(); 
            $table->integer('max_number')->nullable();
            $table->foreignId('user_id')->nullable(); 
            $table->foreignId('team_id')->nullable(); 
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
        Schema::dropIfExists('merges');
    }
}
