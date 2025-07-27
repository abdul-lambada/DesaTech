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
        Schema::table('boundaries', function (Blueprint $table) {
            // Drop columns that don't exist in the current schema
            if (Schema::hasColumn('boundaries', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('boundaries', 'coordinates')) {
                $table->dropColumn('coordinates');
            }
            
            // Add columns if they don't exist
            if (!Schema::hasColumn('boundaries', 'direction')) {
                $table->string('direction')->nullable();
            }
            
            // Make existing columns nullable
            if (Schema::hasColumn('boundaries', 'direction')) {
                $table->string('direction')->nullable()->change();
            }
            if (Schema::hasColumn('boundaries', 'area')) {
                $table->string('area')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boundaries', function (Blueprint $table) {
            // Revert changes if needed
            if (Schema::hasColumn('boundaries', 'direction')) {
                $table->dropColumn('direction');
            }
            
            // Re-add original columns
            $table->string('name')->nullable();
            $table->text('coordinates')->nullable();
        });
    }
};
