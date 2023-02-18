<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNextOfKinsTable extends Migration
{
    public function up()
    {
        Schema::table('next_of_kins', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_7252876')->references('id')->on('users');
        });
    }
}
