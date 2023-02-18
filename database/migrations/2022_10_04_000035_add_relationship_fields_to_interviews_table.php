<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInterviewsTable extends Migration
{
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_7222648')->references('id')->on('users');
        });
    }
}
