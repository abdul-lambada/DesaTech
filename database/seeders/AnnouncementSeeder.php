<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'Pengumuman Pembayaran PBB',
                'content' => 'Diumumkan kepada seluruh warga desa bahwa pembayaran Pajak Bumi dan Bangunan (PBB) tahun 2024 sudah dapat dilakukan di kantor desa mulai tanggal 1 Januari 2024.',
                'priority' => 'Tinggi',
                'date' => '2024-01-01',
            ],
            [
                'title' => 'Jadwal Posyandu Bulan Januari',
                'content' => 'Posyandu akan dilaksanakan pada tanggal 20 Januari 2024 di Posyandu Melati mulai pukul 08:00 WIB. Semua balita dan ibu hamil diharapkan hadir.',
                'priority' => 'Sedang',
                'date' => '2024-01-15',
            ],
            [
                'title' => 'Gotong Royong Membersihkan Desa',
                'content' => 'Akan diadakan gotong royong membersihkan lingkungan desa pada tanggal 30 Januari 2024 mulai pukul 07:00 WIB. Semua warga diharapkan berpartisipasi.',
                'priority' => 'Sedang',
                'date' => '2024-01-25',
            ],
            [
                'title' => 'Pelatihan UMKM Gratis',
                'content' => 'Pemerintah desa akan mengadakan pelatihan UMKM gratis untuk warga desa pada tanggal 25 Januari 2024. Pendaftaran dibuka mulai tanggal 10 Januari 2024.',
                'priority' => 'Tinggi',
                'date' => '2024-01-10',
            ],
            [
                'title' => 'Pemadaman Listrik Bergilir',
                'content' => 'Akan ada pemadaman listrik bergilir di beberapa wilayah desa pada tanggal 28 Januari 2024 untuk perawatan jaringan listrik.',
                'priority' => 'Rendah',
                'date' => '2024-01-26',
            ],
        ];

        foreach ($announcements as $announcement) {
            DB::table('announcements')->insert(array_merge($announcement, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 