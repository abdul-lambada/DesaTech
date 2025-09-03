<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetOverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $budgets = [
            [
                'type' => 'Pendapatan',
                'description' => 'Total Pendapatan Desa',
                'amount' => 'Rp 2,500,000,000',
                'percentage' => 100.00,
            ],
            [
                'type' => 'Belanja',
                'description' => 'Total Belanja Desa',
                'amount' => 'Rp 2,300,000,000',
                'percentage' => 92.00,
            ],
            [
                'type' => 'Pembiayaan',
                'description' => 'Total Pembiayaan',
                'amount' => 'Rp 200,000,000',
                'percentage' => 8.00,
            ],
        ];

        foreach ($budgets as $budget) {
            DB::table('budget_overview')->insert(array_merge($budget, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 