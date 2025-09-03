<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'label' => 'Kecamatan',
                'value' => 'Kecamatan Maju',
                'icon' => 'fas fa-map-marker-alt',
            ],
            [
                'label' => 'Kabupaten',
                'value' => 'Kabupaten Sejahtera',
                'icon' => 'fas fa-city',
            ],
            [
                'label' => 'Provinsi',
                'value' => 'Provinsi Indonesia',
                'icon' => 'fas fa-flag',
            ],
            [
                'label' => 'Kode Pos',
                'value' => '12345',
                'icon' => 'fas fa-mailbox',
            ],
            [
                'label' => 'Koordinat',
                'value' => '-6.2088, 106.8456',
                'icon' => 'fas fa-crosshairs',
            ],
        ];

        foreach ($locations as $location) {
            DB::table('location_info')->insert(array_merge($location, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 