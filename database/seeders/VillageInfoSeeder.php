<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VillageInfo;

class VillageInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villageInfo = [
            'name' => 'DesaTech',
            'code' => '3201012001',
            'district' => 'Kecamatan Digital',
            'regency' => 'Kabupaten Teknologi',
            'province' => 'Provinsi Inovasi',
            'postal_code' => '12345',
            'phone' => '(021) 1234-5678',
            'email' => 'info@desatech.id',
            'website' => 'https://desatech.id',
            'vision' => 'Desa yang maju, mandiri, dan sejahtera dengan teknologi digital',
            'mission' => 'Meningkatkan kualitas pelayanan publik melalui digitalisasi dan inovasi teknologi',
            'values' => 'Transparansi, akuntabilitas, dan pelayanan prima',
            'area_size' => 12.5,
            'population' => 2847,
            'total_families' => 756,
            'rt_count' => 24,
            'rw_count' => 6,
            'latitude' => -6.2088,
            'longitude' => 106.8456,
            'elevation' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        VillageInfo::create($villageInfo);
    }
}
