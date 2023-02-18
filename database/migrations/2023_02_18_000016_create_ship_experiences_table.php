<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('ship_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vessel_name')->nullable();
            $table->string('gt_loa')->nullable();
            $table->string('vessel_route')->nullable();
            $table->string('position')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('reason')->nullable();
            $table->string('job')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
