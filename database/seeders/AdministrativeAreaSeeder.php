<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrativeAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'rw' => 'RW 001',
                'total_kk' => 125,
            ],
            [
                'rw' => 'RW 002',
                'total_kk' => 118,
            ],
            [
                'rw' => 'RW 003',
                'total_kk' => 132,
            ],
            [
                'rw' => 'RW 004',
                'total_kk' => 145,
            ],
            [
                'rw' => 'RW 005',
                'total_kk' => 92,
            ],
        ];

        foreach ($areas as $area) {
            DB::table('administrative_areas')->insert(array_merge($area, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 