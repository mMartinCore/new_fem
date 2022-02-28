<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            $table->string('name');  
            $table->string('courier')->nullable();
           
            $table->string('courier_status');
            $table->string('tracking_number')->nullable(); 

            $table->string('payment_mode');
            $table->string('payment_status');
            $table->string('status');
            $table->date('package_status_date');

            $table->float('price')->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('length')->nullable();
            $table->decimal('width')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('height')->nullable();
            $table->text('description')->nullable();
            $table->date('estimate_date')->nullable();
            $table->string('destination')->nullable();  
            $table->date('handover_date')->nullable();
            $table->string('handovername')->nullable();
            $table->string('package_id')->nullable();

            $table->foreignId('packagestatus_id')->nullable(); 
            $table->foreignId('category_id')->nullable();
             
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
        Schema::dropIfExists('packages');
    }
}
