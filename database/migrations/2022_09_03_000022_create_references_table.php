<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employers_name')->nullable();
            $table->longText('address_and_email_contact_number')->nullable();
            $table->longText('recommendation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
