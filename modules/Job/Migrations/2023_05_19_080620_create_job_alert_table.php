<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bc_job_alerts', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('email');
            $table->bigInteger('user_id')->nullable();
            $table->string('frequency',30)->nullable()->default('daily');
            $table->bigInteger('query_id');
            $table->string('locale',20)->nullable()->default('en');

            $table->index(['user_id']);
            $table->index(['email']);

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();

            $table->timestamps();
        });

        Schema::create('bc_job_alert_queries', function (Blueprint $table) {
            $table->id();

            $table->string('hash')->unique();
            $table->text('query');

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bc_job_alerts');
        Schema::dropIfExists('bc_job_alert_queries');
    }
};
