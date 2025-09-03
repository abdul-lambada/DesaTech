<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssistanceProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Program Keluarga Harapan (PKH)',
                'description' => 'Bantuan tunai bersyarat untuk keluarga miskin dan rentan',
                'recipients' => 150,
            ],
            [
                'name' => 'Bantuan Pangan Non Tunai (BPNT)',
                'description' => 'Bantuan pangan untuk keluarga miskin',
                'recipients' => 200,
            ],
            [
                'name' => 'Bantuan Tunai Langsung (BLT)',
                'description' => 'Bantuan tunai langsung untuk keluarga terdampak',
                'recipients' => 100,
            ],
            [
                'name' => 'Program Indonesia Pintar (PIP)',
                'description' => 'Bantuan pendidikan untuk anak-anak dari keluarga miskin',
                'recipients' => 75,
            ],
            [
                'name' => 'Bantuan Sosial Tunai (BST)',
                'description' => 'Bantuan sosial tunai untuk keluarga miskin',
                'recipients' => 120,
            ],
            [
                'name' => 'Program Bantuan UMKM',
                'description' => 'Bantuan modal usaha untuk pengembangan UMKM',
                'recipients' => 50,
            ],
        ];

        foreach ($programs as $program) {
            DB::table('assistance_programs')->insert(array_merge($program, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 