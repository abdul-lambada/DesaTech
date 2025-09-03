<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FinancialReport;

class FinancialReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = [
            [
                'name' => 'Laporan Keuangan Bulan Januari 2024',
                'description' => 'Laporan realisasi anggaran pendapatan dan belanja desa bulan Januari 2024',
                'type' => 'PDF',
                'date' => '2024-01-31',
                'size' => '2.5 MB',
                'icon' => 'DocumentIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laporan Keuangan Bulan Februari 2024',
                'description' => 'Laporan realisasi anggaran pendapatan dan belanja desa bulan Februari 2024',
                'type' => 'PDF',
                'date' => '2024-02-29',
                'size' => '2.8 MB',
                'icon' => 'DocumentIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laporan Keuangan Triwulan I 2024',
                'description' => 'Laporan realisasi anggaran pendapatan dan belanja desa triwulan I tahun 2024',
                'type' => 'PDF',
                'date' => '2024-03-31',
                'size' => '5.2 MB',
                'icon' => 'DocumentIcon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($reports as $report) {
            FinancialReport::create($report);
        }
    }
}
