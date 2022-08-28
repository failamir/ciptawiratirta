<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSgpsTable extends Migration
{
    public function up()
    {
        Schema::table('sgps', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id', 'candidate_fk_7218407')->references('id')->on('users');
            $table->unsignedBigInteger('applied_position_id')->nullable();
            $table->foreign('applied_position_id', 'applied_position_fk_7219813')->references('id')->on('jobs');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_7220195')->references('id')->on('departments');
            $table->unsignedBigInteger('int_by_id')->nullable();
            $table->foreign('int_by_id', 'int_by_fk_7222041')->references('id')->on('users');
            $table->unsignedBigInteger('approved_as_id')->nullable();
            $table->foreign('approved_as_id', 'approved_as_fk_7222044')->references('id')->on('jobs');
        });
    }
}
