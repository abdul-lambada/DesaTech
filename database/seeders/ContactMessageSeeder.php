<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'phone' => '+62 812-3456-7890',
                'category' => 'Pertanyaan Umum',
                'subject' => 'Informasi Pelayanan Desa',
                'message' => 'Saya ingin menanyakan tentang prosedur pengurusan surat keterangan domisili. Mohon informasi lengkapnya.',
                'agreement' => true,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'phone' => '+62 812-3456-7891',
                'category' => 'Pengaduan',
                'subject' => 'Jalan Rusak di RT 05',
                'message' => 'Jalan di RT 05 sudah rusak parah dan sulit dilalui. Mohon segera diperbaiki.',
                'agreement' => true,
            ],
            [
                'name' => 'Ahmad Supriyadi',
                'email' => 'ahmad@example.com',
                'phone' => '+62 812-3456-7892',
                'category' => 'Saran',
                'subject' => 'Saran Pengembangan Desa',
                'message' => 'Saya ingin memberikan saran untuk pengembangan wisata desa yang bisa meningkatkan ekonomi warga.',
                'agreement' => true,
            ],
            [
                'name' => 'Dewi Sartika',
                'email' => 'dewi@example.com',
                'phone' => '+62 812-3456-7893',
                'category' => 'Kritik',
                'subject' => 'Pelayanan yang Lambat',
                'message' => 'Pelayanan di kantor desa terasa lambat. Mohon ditingkatkan kualitas pelayanannya.',
                'agreement' => true,
            ],
            [
                'name' => 'Rudi Hartono',
                'email' => 'rudi@example.com',
                'phone' => '+62 812-3456-7894',
                'category' => 'Pertanyaan Umum',
                'subject' => 'Jadwal Posyandu',
                'message' => 'Kapan jadwal posyandu untuk bulan depan? Saya ingin membawa anak saya.',
                'agreement' => true,
            ],
        ];

        foreach ($messages as $message) {
            DB::table('contact_messages')->insert(array_merge($message, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 