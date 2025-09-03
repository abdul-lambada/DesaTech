<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleryItems = [
            [
                'title' => 'Pembangunan Jembatan Desa',
                'type' => 'image',
                'thumbnail' => 'jembatan-thumb.jpg',
                'url' => 'jembatan-full.jpg',
                'date' => '2024-01-15',
            ],
            [
                'title' => 'Festival Budaya Desa',
                'type' => 'image',
                'thumbnail' => 'festival-thumb.jpg',
                'url' => 'festival-full.jpg',
                'date' => '2024-01-20',
            ],
            [
                'title' => 'Pelatihan UMKM',
                'type' => 'image',
                'thumbnail' => 'umkm-thumb.jpg',
                'url' => 'umkm-full.jpg',
                'date' => '2024-01-25',
            ],
            [
                'title' => 'Gotong Royong',
                'type' => 'image',
                'thumbnail' => 'gotong-royong-thumb.jpg',
                'url' => 'gotong-royong-full.jpg',
                'date' => '2024-01-30',
            ],
            [
                'title' => 'Video Dokumentasi Desa',
                'type' => 'video',
                'thumbnail' => 'video-thumb.jpg',
                'url' => 'https://www.youtube.com/watch?v=example',
                'date' => '2024-02-01',
            ],
            [
                'title' => 'Kantor Desa',
                'type' => 'image',
                'thumbnail' => 'kantor-thumb.jpg',
                'url' => 'kantor-full.jpg',
                'date' => '2024-02-05',
            ],
        ];

        foreach ($galleryItems as $item) {
            DB::table('gallery_items')->insert(array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 