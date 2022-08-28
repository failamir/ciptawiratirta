<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ship_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
