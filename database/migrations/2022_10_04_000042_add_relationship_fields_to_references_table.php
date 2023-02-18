<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReferencesTable extends Migration
{
    public function up()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_7252812')->references('id')->on('users');
        });
    }
}
