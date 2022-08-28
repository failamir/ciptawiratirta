<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('experience_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_7220368')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('experience_id');
            $table->foreign('experience_id', 'experience_id_fk_7220368')->references('id')->on('experiences')->onDelete('cascade');
        });
    }
}
