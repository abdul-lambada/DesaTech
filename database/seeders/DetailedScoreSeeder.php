<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailedScore;

class DetailedScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores = [
            [
                'aspect' => 'Ketersediaan Informasi Anggaran',
                'score' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aspect' => 'Ketersediaan Laporan Keuangan',
                'score' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aspect' => 'Transparansi Program Pembangunan',
                'score' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aspect' => 'Ketersediaan Informasi Publik',
                'score' => 88,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'aspect' => 'Partisipasi Masyarakat',
                'score' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($scores as $score) {
            DetailedScore::create($score);
        }
    }
}
