<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'name' => 'Keluarga Inti',
                'count' => 428,
                'percentage' => 70,
            ],
            [
                'name' => 'Keluarga Besar',
                'count' => 122,
                'percentage' => 20,
            ],
            [
                'name' => 'Keluarga Tunggal',
                'count' => 49,
                'percentage' => 8,
            ],
            [
                'name' => 'Keluarga Lainnya',
                'count' => 13,
                'percentage' => 2,
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('family_types')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 