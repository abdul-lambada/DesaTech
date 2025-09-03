<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Surat Keterangan',
                'description' => 'Pelayanan pengurusan berbagai jenis surat keterangan',
                'icon' => 'fas fa-file-alt',
                'count' => 15,
            ],
            [
                'name' => 'Surat Pengantar',
                'description' => 'Pelayanan pengurusan surat pengantar',
                'icon' => 'fas fa-envelope',
                'count' => 8,
            ],
            [
                'name' => 'Surat Rekomendasi',
                'description' => 'Pelayanan pengurusan surat rekomendasi',
                'icon' => 'fas fa-stamp',
                'count' => 5,
            ],
            [
                'name' => 'Surat Pernyataan',
                'description' => 'Pelayanan pengurusan surat pernyataan',
                'icon' => 'fas fa-handshake',
                'count' => 3,
            ],
            [
                'name' => 'Surat Kuasa',
                'description' => 'Pelayanan pengurusan surat kuasa',
                'icon' => 'fas fa-user-tie',
                'count' => 2,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('service_categories')->insert(array_merge($category, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 