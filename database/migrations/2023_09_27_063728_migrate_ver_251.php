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
        Schema::table('bc_jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_jobs', 'qualification')) {
                $table->text('qualification')->nullable();
            }
        });
        Schema::table('bc_job_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_job_translations', 'qualification')) {
                $table->text('qualification')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
