<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoginsettingsTable extends Migration
{
    public function up()
    {
        Schema::table('loginsettings', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_5790733')->references('id')->on('teams');
        });
    }
}