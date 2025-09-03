<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Rapat Koordinasi Desa',
                'description' => 'Rapat koordinasi bulanan antara perangkat desa dan tokoh masyarakat.',
                'day' => '15',
                'month' => 'Januari',
                'time' => '19:00 WIB',
                'location' => 'Balai Desa',
            ],
            [
                'title' => 'Posyandu Balita',
                'description' => 'Kegiatan posyandu untuk balita usia 0-5 tahun.',
                'day' => '20',
                'month' => 'Januari',
                'time' => '08:00 WIB',
                'location' => 'Posyandu Melati',
            ],
            [
                'title' => 'Pelatihan UMKM',
                'description' => 'Pelatihan pengembangan usaha mikro kecil menengah.',
                'day' => '25',
                'month' => 'Januari',
                'time' => '09:00 WIB',
                'location' => 'Aula Desa',
            ],
            [
                'title' => 'Gotong Royong',
                'description' => 'Kegiatan gotong royong membersihkan lingkungan desa.',
                'day' => '30',
                'month' => 'Januari',
                'time' => '07:00 WIB',
                'location' => 'Seluruh Desa',
            ],
            [
                'title' => 'Rapat Pengurus RT/RW',
                'description' => 'Rapat koordinasi pengurus RT dan RW se-desa.',
                'day' => '05',
                'month' => 'Februari',
                'time' => '19:30 WIB',
                'location' => 'Kantor Desa',
            ],
        ];

        foreach ($events as $event) {
            DB::table('events')->insert(array_merge($event, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 