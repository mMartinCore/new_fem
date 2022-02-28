<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactsettingsTable extends Migration
{
    public function up()
    {
        Schema::table('contactsettings', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_5790712')->references('id')->on('teams');
        });
    }
}