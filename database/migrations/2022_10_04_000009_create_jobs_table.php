<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('is_urgent')->nullable();
            $table->string('status')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
