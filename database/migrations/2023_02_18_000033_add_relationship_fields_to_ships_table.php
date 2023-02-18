<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShipsTable extends Migration
{
    public function up()
    {
        Schema::table('ships', function (Blueprint $table) {
            $table->unsignedBigInteger('principal_id')->nullable();
            $table->foreign('principal_id', 'principal_fk_7219987')->references('id')->on('principals');
        });
    }
}
