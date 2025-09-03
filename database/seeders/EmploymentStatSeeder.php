<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'sector' => 'Pertanian',
                'count' => 735,
                'percentage' => 30,
            ],
            [
                'sector' => 'Perdagangan',
                'count' => 490,
                'percentage' => 20,
            ],
            [
                'sector' => 'Jasa',
                'count' => 367,
                'percentage' => 15,
            ],
            [
                'sector' => 'Industri',
                'count' => 245,
                'percentage' => 10,
            ],
            [
                'sector' => 'PNS',
                'count' => 196,
                'percentage' => 8,
            ],
            [
                'sector' => 'Swasta',
                'count' => 294,
                'percentage' => 12,
            ],
            [
                'sector' => 'Lainnya',
                'count' => 123,
                'percentage' => 5,
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('employment_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 