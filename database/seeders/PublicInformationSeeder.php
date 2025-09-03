<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PublicInformation;

class PublicInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $informations = [
            [
                'name' => 'Profil Desa',
                'description' => 'Informasi lengkap tentang profil desa, sejarah, dan kondisi geografis',
                'last_update' => '2024-01-15',
                'icon' => 'BuildingOfficeIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Struktur Organisasi Pemerintahan Desa',
                'description' => 'Struktur organisasi dan susunan perangkat desa',
                'last_update' => '2024-01-10',
                'icon' => 'UserGroupIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anggaran Pendapatan dan Belanja Desa (APBDes)',
                'description' => 'Dokumen APBDes tahun berjalan dan tahun sebelumnya',
                'last_update' => '2024-01-20',
                'icon' => 'DocumentTextIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laporan Realisasi Anggaran',
                'description' => 'Laporan realisasi anggaran pendapatan dan belanja desa',
                'last_update' => '2024-01-25',
                'icon' => 'ChartBarIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Program Pembangunan Desa',
                'description' => 'Program dan kegiatan pembangunan desa yang sedang berjalan',
                'last_update' => '2024-01-18',
                'icon' => 'WrenchScrewdriverIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Layanan Publik',
                'description' => 'Informasi tentang layanan publik yang disediakan desa',
                'last_update' => '2024-01-12',
                'icon' => 'CogIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($informations as $information) {
            PublicInformation::create($information);
        }
    }
}
