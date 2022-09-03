<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormalEducationsTable extends Migration
{
    public function up()
    {
        Schema::create('formal_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_academy')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('qualification_attained')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
