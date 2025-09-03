<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'label' => 'Luas Wilayah',
                'value' => '1,250 Ha',
            ],
            [
                'label' => 'Jumlah Dusun',
                'value' => '4 Dusun',
            ],
            [
                'label' => 'Jumlah RT',
                'value' => '20 RT',
            ],
            [
                'label' => 'Jumlah RW',
                'value' => '5 RW',
            ],
            [
                'label' => 'Jumlah KK',
                'value' => '612 KK',
            ],
            [
                'label' => 'Total Penduduk',
                'value' => '2,450 Jiwa',
            ],
            [
                'label' => 'Laki-laki',
                'value' => '1,250 Jiwa',
            ],
            [
                'label' => 'Perempuan',
                'value' => '1,200 Jiwa',
            ],
        ];

        foreach ($stats as $stat) {
            DB::table('village_stats')->insert(array_merge($stat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 