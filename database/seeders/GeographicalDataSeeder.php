<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeographicalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'label' => 'Ketinggian',
                'value' => '150-200 mdpl',
                'icon' => 'fas fa-mountain',
            ],
            [
                'label' => 'Curah Hujan',
                'value' => '2,500-3,000 mm/tahun',
                'icon' => 'fas fa-cloud-rain',
            ],
            [
                'label' => 'Suhu Rata-rata',
                'value' => '25-30°C',
                'icon' => 'fas fa-thermometer-half',
            ],
            [
                'label' => 'Kelembaban',
                'value' => '70-80%',
                'icon' => 'fas fa-tint',
            ],
            [
                'label' => 'Topografi',
                'value' => 'Dataran Rendah',
                'icon' => 'fas fa-map',
            ],
        ];

        foreach ($data as $item) {
            DB::table('geographical_data')->insert(array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 