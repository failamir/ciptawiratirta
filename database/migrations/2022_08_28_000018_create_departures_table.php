<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeparturesTable extends Migration
{
    public function up()
    {
        Schema::create('departures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('departure_date')->nullable();
            $table->longText('procedure')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
