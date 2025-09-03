<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Keluarga Miskin',
                'count' => 300,
                'percentage' => 50,
            ],
            [
                'name' => 'Lansia',
                'count' => 120,
                'percentage' => 20,
            ],
            [
                'name' => 'Anak-anak',
                'count' => 90,
                'percentage' => 15,
            ],
            [
                'name' => 'Penyandang Disabilitas',
                'count' => 45,
                'percentage' => 8,
            ],
            [
                'name' => 'Keluarga Rentan',
                'count' => 30,
                'percentage' => 5,
            ],
            [
                'name' => 'Lainnya',
                'count' => 15,
                'percentage' => 2,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('recipient_categories')->insert(array_merge($category, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 