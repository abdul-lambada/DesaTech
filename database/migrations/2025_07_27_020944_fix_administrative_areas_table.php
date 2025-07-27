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
        Schema::table('administrative_areas', function (Blueprint $table) {
            // Drop columns that don't exist in the current schema
            if (Schema::hasColumn('administrative_areas', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('administrative_areas', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('administrative_areas', 'population')) {
                $table->dropColumn('population');
            }
            if (Schema::hasColumn('administrative_areas', 'area')) {
                $table->dropColumn('area');
            }
            
            // Add columns if they don't exist
            if (!Schema::hasColumn('administrative_areas', 'rw')) {
                $table->string('rw')->nullable();
            }
            if (!Schema::hasColumn('administrative_areas', 'total_kk')) {
                $table->unsignedInteger('total_kk')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administrative_areas', function (Blueprint $table) {
            // Revert changes if needed
            if (Schema::hasColumn('administrative_areas', 'rw')) {
                $table->dropColumn('rw');
            }
            if (Schema::hasColumn('administrative_areas', 'total_kk')) {
                $table->dropColumn('total_kk');
            }
            
            // Re-add original columns
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->integer('population')->nullable();
            $table->decimal('area', 10, 2)->nullable();
        });
    }
};
