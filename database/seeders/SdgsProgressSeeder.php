<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SdgsProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $progress = [
            [
                'goal' => 'SDG 1',
                'title' => 'Tanpa Kemiskinan',
                'progress' => 85,
                'status' => 'Baik',
            ],
            [
                'goal' => 'SDG 2',
                'title' => 'Tanpa Kelaparan',
                'progress' => 90,
                'status' => 'Sangat Baik',
            ],
            [
                'goal' => 'SDG 3',
                'title' => 'Kehidupan Sehat dan Sejahtera',
                'progress' => 78,
                'status' => 'Baik',
            ],
            [
                'goal' => 'SDG 4',
                'title' => 'Pendidikan Berkualitas',
                'progress' => 82,
                'status' => 'Baik',
            ],
            [
                'goal' => 'SDG 5',
                'title' => 'Kesetaraan Gender',
                'progress' => 75,
                'status' => 'Baik',
            ],
            [
                'goal' => 'SDG 6',
                'title' => 'Air Bersih dan Sanitasi Layak',
                'progress' => 88,
                'status' => 'Sangat Baik',
            ],
            [
                'goal' => 'SDG 7',
                'title' => 'Energi Bersih dan Terjangkau',
                'progress' => 70,
                'status' => 'Cukup',
            ],
            [
                'goal' => 'SDG 8',
                'title' => 'Pekerjaan Layak dan Pertumbuhan Ekonomi',
                'progress' => 72,
                'status' => 'Baik',
            ],
        ];

        foreach ($progress as $item) {
            DB::table('sdgs_progress')->insert(array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 