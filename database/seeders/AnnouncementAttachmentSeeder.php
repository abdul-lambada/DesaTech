<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attachments = [
            [
                'announcement_id' => 1,
                'name' => 'surat-pbb-2024.pdf',
            ],
            [
                'announcement_id' => 1,
                'name' => 'jadwal-pembayaran-pbb.pdf',
            ],
            [
                'announcement_id' => 2,
                'name' => 'jadwal-posyandu-januari.pdf',
            ],
            [
                'announcement_id' => 3,
                'name' => 'surat-gotong-royong.pdf',
            ],
            [
                'announcement_id' => 4,
                'name' => 'formulir-pendaftaran-umkm.pdf',
            ],
            [
                'announcement_id' => 4,
                'name' => 'brochure-pelatihan-umkm.pdf',
            ],
            [
                'announcement_id' => 5,
                'name' => 'jadwal-pemadaman-listrik.pdf',
            ],
        ];

        foreach ($attachments as $attachment) {
            DB::table('announcement_attachments')->insert(array_merge($attachment, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 