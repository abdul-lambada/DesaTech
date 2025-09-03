<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LetterServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Surat Keterangan Domisili',
                'description' => 'Surat keterangan tempat tinggal',
                'icon' => 'fas fa-home',
                'duration' => '1-2 hari kerja',
            ],
            [
                'name' => 'Surat Keterangan Usaha',
                'description' => 'Surat keterangan usaha',
                'icon' => 'fas fa-store',
                'duration' => '2-3 hari kerja',
            ],
            [
                'name' => 'Surat Pengantar KTP',
                'description' => 'Surat pengantar pembuatan KTP',
                'icon' => 'fas fa-id-card',
                'duration' => '1 hari kerja',
            ],
            [
                'name' => 'Surat Pengantar KK',
                'description' => 'Surat pengantar pembuatan Kartu Keluarga',
                'icon' => 'fas fa-users',
                'duration' => '1 hari kerja',
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Surat keterangan tidak mampu',
                'icon' => 'fas fa-hand-holding-heart',
                'duration' => '3-5 hari kerja',
            ],
            [
                'name' => 'Surat Pengantar Nikah',
                'description' => 'Surat pengantar pernikahan',
                'icon' => 'fas fa-heart',
                'duration' => '2-3 hari kerja',
            ],
        ];

        foreach ($services as $service) {
            DB::table('letter_services')->insert(array_merge($service, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 