<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdmScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores = [
            [
                'score' => 75.50,
                'category' => 'Sangat Maju',
                'percentage' => 85,
            ],
            [
                'score' => 65.25,
                'category' => 'Maju',
                'percentage' => 10,
            ],
            [
                'score' => 45.75,
                'category' => 'Berkembang',
                'percentage' => 3,
            ],
            [
                'score' => 25.30,
                'category' => 'Tertinggal',
                'percentage' => 2,
            ],
        ];

        foreach ($scores as $score) {
            DB::table('idm_scores')->insert(array_merge($score, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 