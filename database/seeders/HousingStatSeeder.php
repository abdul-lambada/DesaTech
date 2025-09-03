<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousingStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'status' => 'Milik Sendiri',
                'count' => 520,
                'percentage' => 85,
            ],
            [
                'status' => 'Sewa',
                'count' => 49,
                'percentage' => 8,
            ],
            [
                'status' => 'Kontrak',
                'count' => 31,
                'percentage' => 5,
            ],
            [
                'status' => 'Lainnya',
                'count' => 12,
                'percentage' => 2,
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('housing_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 