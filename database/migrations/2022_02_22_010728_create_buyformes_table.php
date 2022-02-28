<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyformes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->string('piece');
            $table->string('status')->nullable();
            $table->text('description')->nullable();
            $table->text('reference')->nullable();
            $table->foreignId('user_id')->nullable(); 
            $table->foreignId('team_id')->nullable();
            $table->foreignId('payment_id')->nullable(); 
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
        Schema::dropIfExists('buyformes');
    }
}
