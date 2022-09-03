<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeckCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('deck_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course')->nullable();
            $table->string('institution')->nullable();
            $table->string('place')->nullable();
            $table->string('cert_number')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->string('type_certificates')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
