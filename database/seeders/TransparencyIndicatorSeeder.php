<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransparencyIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indicators = [
            [
                'name' => 'Informasi Keuangan',
                'value' => 'Tersedia',
                'description' => 'Informasi keuangan desa tersedia dan dapat diakses publik',
            ],
            [
                'name' => 'Informasi Program',
                'value' => 'Tersedia',
                'description' => 'Informasi program pembangunan desa tersedia',
            ],
            [
                'name' => 'Informasi Kependudukan',
                'value' => 'Tersedia',
                'description' => 'Data kependudukan desa tersedia',
            ],
            [
                'name' => 'Informasi Pelayanan',
                'value' => 'Tersedia',
                'description' => 'Informasi pelayanan publik tersedia',
            ],
            [
                'name' => 'Informasi Perencanaan',
                'value' => 'Tersedia',
                'description' => 'Informasi perencanaan pembangunan desa tersedia',
            ],
        ];

        foreach ($indicators as $indicator) {
            DB::table('transparency_indicators')->insert(array_merge($indicator, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 