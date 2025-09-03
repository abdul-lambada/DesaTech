<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pembangunan',
                'amount' => 'Rp 800,000,000',
                'percentage' => 32.00,
                'color' => '#3B82F6',
            ],
            [
                'name' => 'Pemberdayaan',
                'amount' => 'Rp 500,000,000',
                'percentage' => 20.00,
                'color' => '#10B981',
            ],
            [
                'name' => 'Pelayanan',
                'amount' => 'Rp 400,000,000',
                'percentage' => 16.00,
                'color' => '#F59E0B',
            ],
            [
                'name' => 'Administrasi',
                'amount' => 'Rp 300,000,000',
                'percentage' => 12.00,
                'color' => '#EF4444',
            ],
            [
                'name' => 'Kesehatan',
                'amount' => 'Rp 250,000,000',
                'percentage' => 10.00,
                'color' => '#8B5CF6',
            ],
            [
                'name' => 'Pendidikan',
                'amount' => 'Rp 200,000,000',
                'percentage' => 8.00,
                'color' => '#06B6D4',
            ],
            [
                'name' => 'Lainnya',
                'amount' => 'Rp 50,000,000',
                'percentage' => 2.00,
                'color' => '#6B7280',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('budget_categories')->insert(array_merge($category, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 