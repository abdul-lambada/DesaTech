<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Berita Desa',
            'Pengumuman',
            'Kegiatan',
            'Pembangunan',
            'Kesehatan',
            'Pendidikan',
            'Ekonomi',
            'Sosial Budaya',
            'Lingkungan',
            'Keamanan',
        ];

        foreach ($categories as $category) {
            DB::table('news_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 