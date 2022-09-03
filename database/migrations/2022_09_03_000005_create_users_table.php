<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('two_factor')->default(0)->nullable();
            $table->string('two_factor_code')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('ktp')->nullable();
            $table->string('passport')->nullable();
            $table->string('visa')->nullable();
            $table->string('bst_ccm')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->date('b_o_d')->nullable();
            $table->string('vc_yf')->nullable();
            $table->string('vc_covid')->nullable();
            $table->string('age')->nullable();
            $table->string('cid')->nullable();
            $table->string('coc')->nullable();
            $table->string('rating_able')->nullable();
            $table->string('ccm')->nullable();
            $table->string('application_form')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('nationality')->nullable();
            $table->string('home_airport')->nullable();
            $table->string('post_code')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('department_applied')->nullable();
            $table->datetime('two_factor_expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
