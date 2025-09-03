<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'year' => '1980',
                'title' => 'Pembentukan Desa',
                'description' => 'Desa ini dibentuk berdasarkan Peraturan Daerah dan mulai beroperasi sebagai desa mandiri.',
            ],
            [
                'year' => '1990',
                'title' => 'Pembangunan Balai Desa',
                'description' => 'Pembangunan balai desa pertama untuk pusat administrasi dan kegiatan warga.',
            ],
            [
                'year' => '2000',
                'title' => 'Pembangunan Jalan Desa',
                'description' => 'Pembangunan jalan utama desa untuk meningkatkan aksesibilitas warga.',
            ],
            [
                'year' => '2010',
                'title' => 'Program Listrik Desa',
                'description' => 'Pemasangan listrik desa untuk meningkatkan kualitas hidup warga.',
            ],
            [
                'year' => '2020',
                'title' => 'Pembangunan Puskesmas',
                'description' => 'Pembangunan puskesmas desa untuk meningkatkan pelayanan kesehatan.',
            ],
            [
                'year' => '2024',
                'title' => 'Digitalisasi Desa',
                'description' => 'Implementasi sistem informasi desa untuk meningkatkan pelayanan publik.',
            ],
        ];

        foreach ($events as $event) {
            DB::table('history_events')->insert(array_merge($event, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 