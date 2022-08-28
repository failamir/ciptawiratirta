<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrincipalsTable extends Migration
{
    public function up()
    {
        Schema::create('principals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('principal_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
