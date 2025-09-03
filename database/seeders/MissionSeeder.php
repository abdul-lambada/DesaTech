<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missions = [
            [
                'mission' => 'Meningkatkan kualitas pelayanan publik yang transparan dan akuntabel.',
            ],
            [
                'mission' => 'Mengembangkan ekonomi desa melalui pemberdayaan UMKM dan sektor pertanian.',
            ],
            [
                'mission' => 'Meningkatkan kualitas pendidikan dan kesehatan warga desa.',
            ],
            [
                'mission' => 'Membangun infrastruktur desa yang berkelanjutan dan ramah lingkungan.',
            ],
            [
                'mission' => 'Mengembangkan potensi wisata desa untuk meningkatkan pendapatan warga.',
            ],
            [
                'mission' => 'Meningkatkan partisipasi warga dalam pembangunan desa.',
            ],
        ];

        foreach ($missions as $mission) {
            DB::table('missions')->insert(array_merge($mission, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 