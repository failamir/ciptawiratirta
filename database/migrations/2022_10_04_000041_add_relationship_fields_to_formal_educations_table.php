<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFormalEducationsTable extends Migration
{
    public function up()
    {
        Schema::table('formal_educations', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_7252807')->references('id')->on('users');
        });
    }
}
