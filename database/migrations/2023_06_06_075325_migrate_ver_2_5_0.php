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
        //
        Schema::table('bc_companies', function (Blueprint $table) {
            if(!Schema::hasColumn('bc_companies', 'gallery')) {
                $table->string('gallery')->nullable();
            }
            if(!Schema::hasColumn('bc_companies', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if(!Schema::hasColumn('bc_companies', 'is_verified')) {
                $table->smallInteger('is_verified')->nullable();
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
