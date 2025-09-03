<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilySizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'members' => '1-2 orang',
                'count' => 122,
                'percentage' => 20,
            ],
            [
                'members' => '3-4 orang',
                'count' => 245,
                'percentage' => 40,
            ],
            [
                'members' => '5-6 orang',
                'count' => 184,
                'percentage' => 30,
            ],
            [
                'members' => '>6 orang',
                'count' => 61,
                'percentage' => 10,
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('family_sizes')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 