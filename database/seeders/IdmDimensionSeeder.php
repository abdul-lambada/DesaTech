<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdmDimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions = [
            [
                'name' => 'Infrastruktur',
                'score' => 80,
            ],
            [
                'name' => 'Pelayanan Publik',
                'score' => 75,
            ],
            [
                'name' => 'Ekonomi',
                'score' => 70,
            ],
            [
                'name' => 'Sosial Budaya',
                'score' => 85,
            ],
            [
                'name' => 'Lingkungan',
                'score' => 78,
            ],
        ];

        foreach ($dimensions as $dimension) {
            DB::table('idm_dimensions')->insert(array_merge($dimension, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 