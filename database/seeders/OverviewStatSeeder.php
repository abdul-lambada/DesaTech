<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OverviewStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'label' => 'Total Penduduk',
                'value' => '2,450',
                'change' => '+2.5%',
            ],
            [
                'label' => 'Keluarga',
                'value' => '612',
                'change' => '+1.8%',
            ],
            [
                'label' => 'Luas Wilayah',
                'value' => '1,250 Ha',
                'change' => null,
            ],
            [
                'label' => 'Pendapatan Per Kapita',
                'value' => 'Rp 3,200,000',
                'change' => '+5.2%',
            ],
            [
                'label' => 'Angka Kemiskinan',
                'value' => '8.5%',
                'change' => '-1.2%',
            ],
            [
                'label' => 'Tingkat Pendidikan',
                'value' => '85%',
                'change' => '+3.1%',
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('overview_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 