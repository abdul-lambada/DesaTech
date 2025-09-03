<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'day' => 'Senin',
                'day_short' => 'Sen',
                'hours' => '08:00 - 16:00',
                'status' => 'Buka',
            ],
            [
                'day' => 'Selasa',
                'day_short' => 'Sel',
                'hours' => '08:00 - 16:00',
                'status' => 'Buka',
            ],
            [
                'day' => 'Rabu',
                'day_short' => 'Rab',
                'hours' => '08:00 - 16:00',
                'status' => 'Buka',
            ],
            [
                'day' => 'Kamis',
                'day_short' => 'Kam',
                'hours' => '08:00 - 16:00',
                'status' => 'Buka',
            ],
            [
                'day' => 'Jumat',
                'day_short' => 'Jum',
                'hours' => '08:00 - 16:00',
                'status' => 'Buka',
            ],
            [
                'day' => 'Sabtu',
                'day_short' => 'Sab',
                'hours' => '08:00 - 12:00',
                'status' => 'Setengah Hari',
            ],
            [
                'day' => 'Minggu',
                'day_short' => 'Min',
                'hours' => '-',
                'status' => 'Tutup',
            ],
        ];

        foreach ($schedules as $schedule) {
            DB::table('office_schedules')->insert(array_merge($schedule, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 