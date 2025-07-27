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
        // Fix village_officials table
        Schema::table('village_officials', function (Blueprint $table) {
            if (Schema::hasColumn('village_officials', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('village_officials', 'position')) {
                $table->string('position')->nullable()->change();
            }
            if (Schema::hasColumn('village_officials', 'phone')) {
                $table->string('phone')->nullable()->change();
            }
            if (Schema::hasColumn('village_officials', 'email')) {
                $table->string('email')->nullable()->change();
            }
            if (Schema::hasColumn('village_officials', 'office_hours')) {
                $table->string('office_hours')->nullable()->change();
            }
        });

        // Fix village_stats table
        Schema::table('village_stats', function (Blueprint $table) {
            if (Schema::hasColumn('village_stats', 'label')) {
                $table->string('label')->nullable()->change();
            }
            if (Schema::hasColumn('village_stats', 'value')) {
                $table->string('value')->nullable()->change();
            }
        });

        // Fix history_events table
        Schema::table('history_events', function (Blueprint $table) {
            if (Schema::hasColumn('history_events', 'year')) {
                $table->string('year')->nullable()->change();
            }
            if (Schema::hasColumn('history_events', 'title')) {
                $table->string('title')->nullable()->change();
            }
        });

        // Fix government_structure table
        Schema::table('government_structure', function (Blueprint $table) {
            if (Schema::hasColumn('government_structure', 'title')) {
                $table->string('title')->nullable()->change();
            }
            if (Schema::hasColumn('government_structure', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('government_structure', 'period')) {
                $table->string('period')->nullable()->change();
            }
        });

        // Fix service_events table
        Schema::table('service_events', function (Blueprint $table) {
            if (Schema::hasColumn('service_events', 'date')) {
                $table->string('date')->nullable()->change();
            }
            if (Schema::hasColumn('service_events', 'title')) {
                $table->string('title')->nullable()->change();
            }
            if (Schema::hasColumn('service_events', 'time')) {
                $table->string('time')->nullable()->change();
            }
        });

        // Fix letter_services table
        Schema::table('letter_services', function (Blueprint $table) {
            if (Schema::hasColumn('letter_services', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('letter_services', 'description')) {
                $table->string('description')->nullable()->change();
            }
            if (Schema::hasColumn('letter_services', 'icon')) {
                $table->string('icon')->nullable()->change();
            }
            if (Schema::hasColumn('letter_services', 'duration')) {
                $table->string('duration')->nullable()->change();
            }
        });

        // Fix service_categories table
        Schema::table('service_categories', function (Blueprint $table) {
            if (Schema::hasColumn('service_categories', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('service_categories', 'description')) {
                $table->string('description')->nullable()->change();
            }
            if (Schema::hasColumn('service_categories', 'icon')) {
                $table->string('icon')->nullable()->change();
            }
        });

        // Fix contact_messages table
        Schema::table('contact_messages', function (Blueprint $table) {
            if (Schema::hasColumn('contact_messages', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('contact_messages', 'email')) {
                $table->string('email')->nullable()->change();
            }
            if (Schema::hasColumn('contact_messages', 'category')) {
                $table->string('category')->nullable()->change();
            }
            if (Schema::hasColumn('contact_messages', 'subject')) {
                $table->string('subject')->nullable()->change();
            }
        });

        // Fix office_schedules table
        Schema::table('office_schedules', function (Blueprint $table) {
            if (Schema::hasColumn('office_schedules', 'day')) {
                $table->string('day')->nullable()->change();
            }
            if (Schema::hasColumn('office_schedules', 'day_short')) {
                $table->string('day_short')->nullable()->change();
            }
            if (Schema::hasColumn('office_schedules', 'hours')) {
                $table->string('hours')->nullable()->change();
            }
            if (Schema::hasColumn('office_schedules', 'status')) {
                $table->string('status')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert all changes
        Schema::table('village_officials', function (Blueprint $table) {
            if (Schema::hasColumn('village_officials', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
            if (Schema::hasColumn('village_officials', 'position')) {
                $table->string('position')->nullable(false)->change();
            }
            if (Schema::hasColumn('village_officials', 'phone')) {
                $table->string('phone')->nullable(false)->change();
            }
            if (Schema::hasColumn('village_officials', 'email')) {
                $table->string('email')->nullable(false)->change();
            }
            if (Schema::hasColumn('village_officials', 'office_hours')) {
                $table->string('office_hours')->nullable(false)->change();
            }
        });

        Schema::table('village_stats', function (Blueprint $table) {
            if (Schema::hasColumn('village_stats', 'label')) {
                $table->string('label')->nullable(false)->change();
            }
            if (Schema::hasColumn('village_stats', 'value')) {
                $table->string('value')->nullable(false)->change();
            }
        });

        Schema::table('history_events', function (Blueprint $table) {
            if (Schema::hasColumn('history_events', 'year')) {
                $table->string('year')->nullable(false)->change();
            }
            if (Schema::hasColumn('history_events', 'title')) {
                $table->string('title')->nullable(false)->change();
            }
        });

        Schema::table('government_structure', function (Blueprint $table) {
            if (Schema::hasColumn('government_structure', 'title')) {
                $table->string('title')->nullable(false)->change();
            }
            if (Schema::hasColumn('government_structure', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
            if (Schema::hasColumn('government_structure', 'period')) {
                $table->string('period')->nullable(false)->change();
            }
        });

        Schema::table('service_events', function (Blueprint $table) {
            if (Schema::hasColumn('service_events', 'date')) {
                $table->string('date')->nullable(false)->change();
            }
            if (Schema::hasColumn('service_events', 'title')) {
                $table->string('title')->nullable(false)->change();
            }
            if (Schema::hasColumn('service_events', 'time')) {
                $table->string('time')->nullable(false)->change();
            }
        });

        Schema::table('letter_services', function (Blueprint $table) {
            if (Schema::hasColumn('letter_services', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
            if (Schema::hasColumn('letter_services', 'description')) {
                $table->string('description')->nullable(false)->change();
            }
            if (Schema::hasColumn('letter_services', 'icon')) {
                $table->string('icon')->nullable(false)->change();
            }
            if (Schema::hasColumn('letter_services', 'duration')) {
                $table->string('duration')->nullable(false)->change();
            }
        });

        Schema::table('service_categories', function (Blueprint $table) {
            if (Schema::hasColumn('service_categories', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
            if (Schema::hasColumn('service_categories', 'description')) {
                $table->string('description')->nullable(false)->change();
            }
            if (Schema::hasColumn('service_categories', 'icon')) {
                $table->string('icon')->nullable(false)->change();
            }
        });

        Schema::table('contact_messages', function (Blueprint $table) {
            if (Schema::hasColumn('contact_messages', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
            if (Schema::hasColumn('contact_messages', 'email')) {
                $table->string('email')->nullable(false)->change();
            }
            if (Schema::hasColumn('contact_messages', 'category')) {
                $table->string('category')->nullable(false)->change();
            }
            if (Schema::hasColumn('contact_messages', 'subject')) {
                $table->string('subject')->nullable(false)->change();
            }
        });

        Schema::table('office_schedules', function (Blueprint $table) {
            if (Schema::hasColumn('office_schedules', 'day')) {
                $table->string('day')->nullable(false)->change();
            }
            if (Schema::hasColumn('office_schedules', 'day_short')) {
                $table->string('day_short')->nullable(false)->change();
            }
            if (Schema::hasColumn('office_schedules', 'hours')) {
                $table->string('hours')->nullable(false)->change();
            }
            if (Schema::hasColumn('office_schedules', 'status')) {
                $table->string('status')->nullable(false)->change();
            }
        });
    }
};
