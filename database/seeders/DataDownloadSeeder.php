<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataDownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $downloads = [
            [
                'name' => 'Data Penduduk Desa',
                'description' => 'Data kependudukan desa tahun 2024',
                'format' => 'PDF',
                'icon' => 'fas fa-users',
            ],
            [
                'name' => 'Laporan Keuangan Desa',
                'description' => 'Laporan keuangan desa triwulan IV 2024',
                'format' => 'Excel',
                'icon' => 'fas fa-chart-line',
            ],
            [
                'name' => 'Peta Wilayah Desa',
                'description' => 'Peta digital wilayah administrasi desa',
                'format' => 'JPG',
                'icon' => 'fas fa-map',
            ],
            [
                'name' => 'Profil Desa',
                'description' => 'Profil lengkap desa tahun 2024',
                'format' => 'PDF',
                'icon' => 'fas fa-file-alt',
            ],
            [
                'name' => 'Data UMKM',
                'description' => 'Data usaha mikro kecil menengah desa',
                'format' => 'Excel',
                'icon' => 'fas fa-store',
            ],
        ];

        foreach ($downloads as $download) {
            DB::table('data_downloads')->insert(array_merge($download, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 