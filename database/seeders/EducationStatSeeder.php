<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'level' => 'Tidak Sekolah',
                'count' => 245,
                'percentage' => 10,
            ],
            [
                'level' => 'SD',
                'count' => 490,
                'percentage' => 20,
            ],
            [
                'level' => 'SMP',
                'count' => 612,
                'percentage' => 25,
            ],
            [
                'level' => 'SMA',
                'count' => 735,
                'percentage' => 30,
            ],
            [
                'level' => 'D3/S1',
                'count' => 294,
                'percentage' => 12,
            ],
            [
                'level' => 'S2/S3',
                'count' => 74,
                'percentage' => 3,
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('education_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 