<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageOfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officials = [
            [
                'name' => 'Ahmad Supriyadi',
                'position' => 'Kepala Desa',
                'phone' => '+62 812-3456-7890',
                'email' => 'kepaladesa@example.com',
                'office_hours' => 'Senin-Jumat 08:00-16:00',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'position' => 'Sekretaris Desa',
                'phone' => '+62 812-3456-7891',
                'email' => 'sekretaris@example.com',
                'office_hours' => 'Senin-Jumat 08:00-16:00',
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Kasi Pemerintahan',
                'phone' => '+62 812-3456-7892',
                'email' => 'kasipem@example.com',
                'office_hours' => 'Senin-Jumat 08:00-16:00',
            ],
            [
                'name' => 'Dewi Sartika',
                'position' => 'Kasi Kesejahteraan',
                'phone' => '+62 812-3456-7893',
                'email' => 'kasikes@example.com',
                'office_hours' => 'Senin-Jumat 08:00-16:00',
            ],
            [
                'name' => 'Rudi Hartono',
                'position' => 'Kasi Pelayanan',
                'phone' => '+62 812-3456-7894',
                'email' => 'kasipel@example.com',
                'office_hours' => 'Senin-Jumat 08:00-16:00',
            ],
        ];

        foreach ($officials as $official) {
            DB::table('village_officials')->insert(array_merge($official, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 