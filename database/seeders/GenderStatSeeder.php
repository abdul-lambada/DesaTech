<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'type' => 'Laki-laki',
                'count' => 1250,
                'percentage' => 51,
                'color' => '#3B82F6',
            ],
            [
                'type' => 'Perempuan',
                'count' => 1200,
                'percentage' => 49,
                'color' => '#EC4899',
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('gender_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 