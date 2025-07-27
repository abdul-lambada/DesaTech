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
        // Fix family_sizes table
        Schema::table('family_sizes', function (Blueprint $table) {
            if (Schema::hasColumn('family_sizes', 'members')) {
                $table->string('members')->nullable()->change();
            }
            if (Schema::hasColumn('family_sizes', 'count')) {
                $table->unsignedInteger('count')->nullable()->change();
            }
            if (Schema::hasColumn('family_sizes', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable()->change();
            }
        });

        // Fix family_types table
        Schema::table('family_types', function (Blueprint $table) {
            if (Schema::hasColumn('family_types', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('family_types', 'count')) {
                $table->unsignedInteger('count')->nullable()->change();
            }
            if (Schema::hasColumn('family_types', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable()->change();
            }
        });

        // Fix education_stats table
        Schema::table('education_stats', function (Blueprint $table) {
            if (Schema::hasColumn('education_stats', 'level')) {
                $table->string('level')->nullable()->change();
            }
            if (Schema::hasColumn('education_stats', 'count')) {
                $table->unsignedInteger('count')->nullable()->change();
            }
            if (Schema::hasColumn('education_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable()->change();
            }
        });

        // Fix employment_stats table
        Schema::table('employment_stats', function (Blueprint $table) {
            if (Schema::hasColumn('employment_stats', 'status')) {
                $table->string('status')->nullable()->change();
            }
            if (Schema::hasColumn('employment_stats', 'count')) {
                $table->unsignedInteger('count')->nullable()->change();
            }
            if (Schema::hasColumn('employment_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable()->change();
            }
        });

        // Fix housing_stats table
        Schema::table('housing_stats', function (Blueprint $table) {
            if (Schema::hasColumn('housing_stats', 'type')) {
                $table->string('type')->nullable()->change();
            }
            if (Schema::hasColumn('housing_stats', 'count')) {
                $table->unsignedInteger('count')->nullable()->change();
            }
            if (Schema::hasColumn('housing_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert family_sizes table
        Schema::table('family_sizes', function (Blueprint $table) {
            if (Schema::hasColumn('family_sizes', 'members')) {
                $table->string('members')->nullable(false)->change();
            }
            if (Schema::hasColumn('family_sizes', 'count')) {
                $table->unsignedInteger('count')->nullable(false)->change();
            }
            if (Schema::hasColumn('family_sizes', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable(false)->change();
            }
        });

        // Revert family_types table
        Schema::table('family_types', function (Blueprint $table) {
            if (Schema::hasColumn('family_types', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
            if (Schema::hasColumn('family_types', 'count')) {
                $table->unsignedInteger('count')->nullable(false)->change();
            }
            if (Schema::hasColumn('family_types', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable(false)->change();
            }
        });

        // Revert education_stats table
        Schema::table('education_stats', function (Blueprint $table) {
            if (Schema::hasColumn('education_stats', 'level')) {
                $table->string('level')->nullable(false)->change();
            }
            if (Schema::hasColumn('education_stats', 'count')) {
                $table->unsignedInteger('count')->nullable(false)->change();
            }
            if (Schema::hasColumn('education_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable(false)->change();
            }
        });

        // Revert employment_stats table
        Schema::table('employment_stats', function (Blueprint $table) {
            if (Schema::hasColumn('employment_stats', 'status')) {
                $table->string('status')->nullable(false)->change();
            }
            if (Schema::hasColumn('employment_stats', 'count')) {
                $table->unsignedInteger('count')->nullable(false)->change();
            }
            if (Schema::hasColumn('employment_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable(false)->change();
            }
        });

        // Revert housing_stats table
        Schema::table('housing_stats', function (Blueprint $table) {
            if (Schema::hasColumn('housing_stats', 'type')) {
                $table->string('type')->nullable(false)->change();
            }
            if (Schema::hasColumn('housing_stats', 'count')) {
                $table->unsignedInteger('count')->nullable(false)->change();
            }
            if (Schema::hasColumn('housing_stats', 'percentage')) {
                $table->unsignedTinyInteger('percentage')->nullable(false)->change();
            }
        });
    }
};
