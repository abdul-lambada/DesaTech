<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoundarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boundaries = [
            [
                'direction' => 'Utara',
                'area' => 'Desa Sejahtera',
            ],
            [
                'direction' => 'Selatan',
                'area' => 'Desa Makmur',
            ],
            [
                'direction' => 'Barat',
                'area' => 'Desa Maju',
            ],
            [
                'direction' => 'Timur',
                'area' => 'Desa Berkah',
            ],
        ];

        foreach ($boundaries as $boundary) {
            DB::table('boundaries')->insert(array_merge($boundary, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 