<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescreeningsTable extends Migration
{
    public function up()
    {
        Schema::create('prescreenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users')->onDelete('cascade');
            $table->string('test_name');
            $table->decimal('score', 5, 2)->nullable();
            $table->string('file_result')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prescreenings');
    }
}
