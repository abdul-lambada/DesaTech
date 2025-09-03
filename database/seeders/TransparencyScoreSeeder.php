<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransparencyScore;

class TransparencyScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores = [
            [
                'overall' => 85,
                'category' => 'Overall',
                'percentage' => 85,
                'description' => 'Skor transparansi keseluruhan desa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'overall' => 88,
                'category' => 'Financial Transparency',
                'percentage' => 88,
                'description' => 'Transparansi keuangan desa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'overall' => 82,
                'category' => 'Program Transparency',
                'percentage' => 82,
                'description' => 'Transparansi program pembangunan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'overall' => 87,
                'category' => 'Public Information',
                'percentage' => 87,
                'description' => 'Ketersediaan informasi publik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($scores as $score) {
            TransparencyScore::create($score);
        }
    }
}
