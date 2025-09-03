<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'range' => '0-5 tahun',
                'count' => 245,
                'percentage' => 10,
            ],
            [
                'range' => '6-12 tahun',
                'count' => 367,
                'percentage' => 15,
            ],
            [
                'range' => '13-17 tahun',
                'count' => 294,
                'percentage' => 12,
            ],
            [
                'range' => '18-25 tahun',
                'count' => 490,
                'percentage' => 20,
            ],
            [
                'range' => '26-35 tahun',
                'count' => 490,
                'percentage' => 20,
            ],
            [
                'range' => '36-45 tahun',
                'count' => 367,
                'percentage' => 15,
            ],
            [
                'range' => '46-55 tahun',
                'count' => 196,
                'percentage' => 8,
            ],
            [
                'range' => '>55 tahun',
                'count' => 245,
                'percentage' => 10,
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('age_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 