<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrativeRtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rts = [
            // RW 001
            [
                'administrative_area_id' => 1,
                'number' => 'RT 001',
                'head' => 25,
            ],
            [
                'administrative_area_id' => 1,
                'number' => 'RT 002',
                'head' => 28,
            ],
            [
                'administrative_area_id' => 1,
                'number' => 'RT 003',
                'head' => 30,
            ],
            [
                'administrative_area_id' => 1,
                'number' => 'RT 004',
                'head' => 22,
            ],
            
            // RW 002
            [
                'administrative_area_id' => 2,
                'number' => 'RT 005',
                'head' => 26,
            ],
            [
                'administrative_area_id' => 2,
                'number' => 'RT 006',
                'head' => 24,
            ],
            [
                'administrative_area_id' => 2,
                'number' => 'RT 007',
                'head' => 32,
            ],
            [
                'administrative_area_id' => 2,
                'number' => 'RT 008',
                'head' => 36,
            ],
            
            // RW 003
            [
                'administrative_area_id' => 3,
                'number' => 'RT 009',
                'head' => 29,
            ],
            [
                'administrative_area_id' => 3,
                'number' => 'RT 010',
                'head' => 31,
            ],
            [
                'administrative_area_id' => 3,
                'number' => 'RT 011',
                'head' => 27,
            ],
            [
                'administrative_area_id' => 3,
                'number' => 'RT 012',
                'head' => 25,
            ],
            
            // RW 004
            [
                'administrative_area_id' => 4,
                'number' => 'RT 013',
                'head' => 33,
            ],
            [
                'administrative_area_id' => 4,
                'number' => 'RT 014',
                'head' => 28,
            ],
            [
                'administrative_area_id' => 4,
                'number' => 'RT 015',
                'head' => 35,
            ],
            [
                'administrative_area_id' => 4,
                'number' => 'RT 016',
                'head' => 30,
            ],
            
            // RW 005
            [
                'administrative_area_id' => 5,
                'number' => 'RT 017',
                'head' => 24,
            ],
            [
                'administrative_area_id' => 5,
                'number' => 'RT 018',
                'head' => 26,
            ],
            [
                'administrative_area_id' => 5,
                'number' => 'RT 019',
                'head' => 22,
            ],
            [
                'administrative_area_id' => 5,
                'number' => 'RT 020',
                'head' => 20,
            ],
        ];

        foreach ($rts as $rt) {
            DB::table('administrative_rts')->insert(array_merge($rt, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 