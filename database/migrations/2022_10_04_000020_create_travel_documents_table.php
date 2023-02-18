<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('travel_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_of_document')->nullable();
            $table->string('number')->nullable();
            $table->string('place_of_issuance')->nullable();
            $table->date('date_of_issuance')->nullable();
            $table->date('date_of_expiry')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
