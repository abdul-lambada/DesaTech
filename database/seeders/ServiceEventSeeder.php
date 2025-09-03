<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'date' => '15 Januari 2024',
                'title' => 'Pelayanan Kesehatan Gratis',
                'description' => 'Pelayanan kesehatan gratis untuk warga desa yang kurang mampu.',
                'time' => '08:00 - 16:00 WIB',
            ],
            [
                'date' => '20 Januari 2024',
                'title' => 'Pelatihan Kewirausahaan',
                'description' => 'Pelatihan kewirausahaan untuk meningkatkan kemampuan warga dalam berbisnis.',
                'time' => '09:00 - 15:00 WIB',
            ],
            [
                'date' => '25 Januari 2024',
                'title' => 'Pemeriksaan Kesehatan Lansia',
                'description' => 'Pemeriksaan kesehatan khusus untuk warga lanjut usia.',
                'time' => '08:00 - 12:00 WIB',
            ],
            [
                'date' => '30 Januari 2024',
                'title' => 'Pelayanan Administrasi Kependudukan',
                'description' => 'Pelayanan administrasi kependudukan untuk pengurusan dokumen.',
                'time' => '08:00 - 16:00 WIB',
            ],
            [
                'date' => '5 Februari 2024',
                'title' => 'Konsultasi Hukum',
                'description' => 'Konsultasi hukum gratis untuk warga desa.',
                'time' => '10:00 - 14:00 WIB',
            ],
        ];

        foreach ($events as $event) {
            DB::table('service_events')->insert(array_merge($event, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 