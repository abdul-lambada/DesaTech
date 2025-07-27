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
        Schema::table('age_stats', function (Blueprint $table) {
            // Drop columns that don't exist in the current schema
            if (Schema::hasColumn('age_stats', 'age_group')) {
                $table->dropColumn('age_group');
            }
            if (Schema::hasColumn('age_stats', 'color')) {
                $table->dropColumn('color');
            }
            
            // Add columns if they don't exist
            if (!Schema::hasColumn('age_stats', 'range')) {
                $table->string('range')->nullable();
            }
            
            // Make existing columns nullable
            if (Schema::hasColumn('age_stats', 'count')) {
                $table->unsignedInteger('count')->nullable()->change();
            }
            if (Schema::hasColumn('age_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('age_stats', function (Blueprint $table) {
            // Revert changes if needed
            if (Schema::hasColumn('age_stats', 'range')) {
                $table->dropColumn('range');
            }
            
            // Re-add original columns
            $table->string('age_group')->nullable();
            $table->string('color')->nullable();
        });
    }
};
