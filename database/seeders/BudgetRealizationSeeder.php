<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetRealizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $realizations = [
            [
                'category' => 'Pembangunan',
                'planned' => 'Rp 800,000,000',
                'actual' => 'Rp 750,000,000',
                'percentage' => 93.75,
                'status' => 'Baik',
            ],
            [
                'category' => 'Pemberdayaan',
                'planned' => 'Rp 500,000,000',
                'actual' => 'Rp 480,000,000',
                'percentage' => 96.00,
                'status' => 'Sangat Baik',
            ],
            [
                'category' => 'Pelayanan',
                'planned' => 'Rp 400,000,000',
                'actual' => 'Rp 420,000,000',
                'percentage' => 105.00,
                'status' => 'Melebihi Target',
            ],
            [
                'category' => 'Administrasi',
                'planned' => 'Rp 300,000,000',
                'actual' => 'Rp 290,000,000',
                'percentage' => 96.67,
                'status' => 'Sangat Baik',
            ],
            [
                'category' => 'Kesehatan',
                'planned' => 'Rp 250,000,000',
                'actual' => 'Rp 240,000,000',
                'percentage' => 96.00,
                'status' => 'Sangat Baik',
            ],
            [
                'category' => 'Pendidikan',
                'planned' => 'Rp 200,000,000',
                'actual' => 'Rp 195,000,000',
                'percentage' => 97.50,
                'status' => 'Sangat Baik',
            ],
        ];

        foreach ($realizations as $realization) {
            DB::table('budget_realization')->insert(array_merge($realization, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 