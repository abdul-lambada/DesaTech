<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernmentStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $structures = [
            [
                'title' => 'Kepala Desa',
                'name' => 'Ahmad Supriyadi',
                'period' => '2021-2027',
            ],
            [
                'title' => 'Sekretaris Desa',
                'name' => 'Siti Nurhaliza',
                'period' => '2021-2027',
            ],
            [
                'title' => 'Kasi Pemerintahan',
                'name' => 'Budi Santoso',
                'period' => '2021-2027',
            ],
            [
                'title' => 'Kasi Kesejahteraan',
                'name' => 'Dewi Sartika',
                'period' => '2021-2027',
            ],
            [
                'title' => 'Kasi Pelayanan',
                'name' => 'Rudi Hartono',
                'period' => '2021-2027',
            ],
            [
                'title' => 'Kaur Keuangan',
                'name' => 'Maya Indah',
                'period' => '2021-2027',
            ],
            [
                'title' => 'Kaur Umum',
                'name' => 'Joko Widodo',
                'period' => '2021-2027',
            ],
        ];

        foreach ($structures as $structure) {
            DB::table('government_structure')->insert(array_merge($structure, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 