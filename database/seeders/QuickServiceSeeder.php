<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuickService;

class QuickServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Surat Keterangan Domisili',
                'description' => 'Layanan pembuatan surat keterangan domisili',
                'icon' => 'HomeIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Layanan pembuatan surat keterangan tidak mampu',
                'icon' => 'DocumentIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Layanan pembuatan surat keterangan usaha',
                'icon' => 'BriefcaseIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengajuan Proposal',
                'description' => 'Layanan pengajuan proposal pembangunan',
                'icon' => 'ClipboardIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Konsultasi Online',
                'description' => 'Layanan konsultasi online dengan perangkat desa',
                'icon' => 'ChatBubbleLeftRightIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengaduan Masyarakat',
                'description' => 'Layanan pengaduan dan saran dari masyarakat',
                'icon' => 'ExclamationTriangleIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($services as $service) {
            QuickService::create($service);
        }
    }
}
