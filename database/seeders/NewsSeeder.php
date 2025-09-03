<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Pembangunan Jembatan Desa Selesai',
                'excerpt' => 'Pembangunan jembatan penghubung antar dusun telah selesai dan siap digunakan warga.',
                'image' => 'jembatan-desa.jpg',
                'category' => 'Pembangunan',
                'date' => '2024-01-15',
                'views' => 1250,
                'comments' => 23,
            ],
            [
                'title' => 'Pelatihan UMKM untuk Warga Desa',
                'excerpt' => 'Pemerintah desa mengadakan pelatihan UMKM untuk meningkatkan ekonomi warga.',
                'image' => 'pelatihan-umkm.jpg',
                'category' => 'Ekonomi',
                'date' => '2024-01-20',
                'views' => 890,
                'comments' => 15,
            ],
            [
                'title' => 'Posyandu Balita dan Lansia',
                'excerpt' => 'Kegiatan posyandu rutin untuk balita dan lansia di balai desa.',
                'image' => 'posyandu.jpg',
                'category' => 'Kesehatan',
                'date' => '2024-01-25',
                'views' => 567,
                'comments' => 8,
            ],
            [
                'title' => 'Festival Budaya Desa',
                'excerpt' => 'Festival budaya tahunan menampilkan kesenian tradisional desa.',
                'image' => 'festival-budaya.jpg',
                'category' => 'Sosial Budaya',
                'date' => '2024-02-01',
                'views' => 2100,
                'comments' => 45,
            ],
            [
                'title' => 'Penanaman Pohon di Lingkungan Desa',
                'excerpt' => 'Gerakan penghijauan desa dengan penanaman 1000 pohon.',
                'image' => 'penanaman-pohon.jpg',
                'category' => 'Lingkungan',
                'date' => '2024-02-05',
                'views' => 734,
                'comments' => 12,
            ],
        ];

        foreach ($news as $item) {
            DB::table('news')->insert(array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 