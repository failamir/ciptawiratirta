<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSgpsTable extends Migration
{
    public function up()
    {
        Schema::create('sgps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('remarks')->nullable();
            $table->string('crew_code')->nullable();
            $table->date('date_of_entry')->nullable();
            $table->string('source')->nullable();
            $table->string('gender')->nullable();
            $table->string('d_o_b')->nullable();
            $table->string('age')->nullable();
            $table->string('vc_yf')->nullable();
            $table->string('vc_covid')->nullable();
            $table->string('cid')->nullable();
            $table->string('coc')->nullable();
            $table->string('rating_able')->nullable();
            $table->string('ccm')->nullable();
            $table->string('experience')->nullable();
            $table->string('application_form')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->date('int_date')->nullable();
            $table->string('int_result')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
