<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); 
            $table->string('payment_id')->nullable();
            $table->string('payment_mode'); 
            $table->string('amount');
            $table->string('currency');
            $table->string('description')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('payments');
    }
}
