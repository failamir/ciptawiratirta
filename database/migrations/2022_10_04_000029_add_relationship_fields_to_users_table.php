<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('office_registered_id')->nullable();
            $table->foreign('office_registered_id', 'office_registered_fk_7216499')->references('id')->on('offices');
        });
    }
}
