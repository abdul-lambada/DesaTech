<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LetterServiceRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requirements = [
            // Surat Keterangan Domisili
            [
                'letter_service_id' => 1,
                'requirement' => 'Fotokopi KTP',
            ],
            [
                'letter_service_id' => 1,
                'requirement' => 'Fotokopi KK',
            ],
            [
                'letter_service_id' => 1,
                'requirement' => 'Surat pengantar RT/RW',
            ],
            
            // Surat Keterangan Usaha
            [
                'letter_service_id' => 2,
                'requirement' => 'Fotokopi KTP',
            ],
            [
                'letter_service_id' => 2,
                'requirement' => 'Fotokopi KK',
            ],
            [
                'letter_service_id' => 2,
                'requirement' => 'Surat pengantar RT/RW',
            ],
            [
                'letter_service_id' => 2,
                'requirement' => 'Foto lokasi usaha',
            ],
            
            // Surat Pengantar KTP
            [
                'letter_service_id' => 3,
                'requirement' => 'Fotokopi KK',
            ],
            [
                'letter_service_id' => 3,
                'requirement' => 'Surat pengantar RT/RW',
            ],
            [
                'letter_service_id' => 3,
                'requirement' => 'Fotokopi akta kelahiran',
            ],
            
            // Surat Pengantar KK
            [
                'letter_service_id' => 4,
                'requirement' => 'Fotokopi KTP',
            ],
            [
                'letter_service_id' => 4,
                'requirement' => 'Surat pengantar RT/RW',
            ],
            [
                'letter_service_id' => 4,
                'requirement' => 'Fotokopi buku nikah',
            ],
            
            // Surat Keterangan Tidak Mampu
            [
                'letter_service_id' => 5,
                'requirement' => 'Fotokopi KTP',
            ],
            [
                'letter_service_id' => 5,
                'requirement' => 'Fotokopi KK',
            ],
            [
                'letter_service_id' => 5,
                'requirement' => 'Surat pengantar RT/RW',
            ],
            [
                'letter_service_id' => 5,
                'requirement' => 'Surat keterangan penghasilan',
            ],
            
            // Surat Pengantar Nikah
            [
                'letter_service_id' => 6,
                'requirement' => 'Fotokopi KTP',
            ],
            [
                'letter_service_id' => 6,
                'requirement' => 'Fotokopi KK',
            ],
            [
                'letter_service_id' => 6,
                'requirement' => 'Surat pengantar RT/RW',
            ],
            [
                'letter_service_id' => 6,
                'requirement' => 'Fotokopi akta kelahiran',
            ],
        ];

        foreach ($requirements as $requirement) {
            DB::table('letter_service_requirements')->insert(array_merge($requirement, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 