<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proposals = [
            [
                'type' => 'Pembangunan',
                'title' => 'Pembangunan Jembatan Penghubung',
                'description' => 'Proposal pembangunan jembatan penghubung antar dusun untuk memudahkan akses warga.',
                'budget' => 500000000,
                'file' => 'proposal-jembatan.pdf',
                'status' => 'Disetujui',
                'date' => '2024-01-15',
            ],
            [
                'type' => 'Ekonomi',
                'title' => 'Pelatihan UMKM',
                'description' => 'Proposal pelatihan usaha mikro kecil menengah untuk meningkatkan ekonomi warga.',
                'budget' => 25000000,
                'file' => 'proposal-umkm.pdf',
                'status' => 'Proses',
                'date' => '2024-01-20',
            ],
            [
                'type' => 'Kesehatan',
                'title' => 'Pembangunan Posyandu',
                'description' => 'Proposal pembangunan posyandu baru untuk meningkatkan pelayanan kesehatan.',
                'budget' => 75000000,
                'file' => 'proposal-posyandu.pdf',
                'status' => 'Disetujui',
                'date' => '2024-01-25',
            ],
            [
                'type' => 'Pendidikan',
                'title' => 'Beasiswa Pendidikan',
                'description' => 'Proposal program beasiswa pendidikan untuk anak-anak kurang mampu.',
                'budget' => 100000000,
                'file' => 'proposal-beasiswa.pdf',
                'status' => 'Proses',
                'date' => '2024-02-01',
            ],
            [
                'type' => 'Lingkungan',
                'title' => 'Penghijauan Desa',
                'description' => 'Proposal program penghijauan desa dengan penanaman 1000 pohon.',
                'budget' => 15000000,
                'file' => 'proposal-penghijauan.pdf',
                'status' => 'Disetujui',
                'date' => '2024-02-05',
            ],
        ];

        foreach ($proposals as $proposal) {
            DB::table('proposals')->insert(array_merge($proposal, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 