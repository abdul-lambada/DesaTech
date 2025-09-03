<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactInfos = [
            [
                'quick_contact_id' => 1,
                'info' => '+62 812-3456-7890',
            ],
            [
                'quick_contact_id' => 1,
                'info' => '+62 812-3456-7891',
            ],
            [
                'quick_contact_id' => 2,
                'info' => 'desa@example.com',
            ],
            [
                'quick_contact_id' => 2,
                'info' => 'sekretaris@desa.example.com',
            ],
            [
                'quick_contact_id' => 3,
                'info' => '+62 812-3456-7890',
            ],
            [
                'quick_contact_id' => 4,
                'info' => 'Desa Maju Sejahtera',
            ],
            [
                'quick_contact_id' => 5,
                'info' => '@desamajusejahtera',
            ],
        ];

        foreach ($contactInfos as $info) {
            DB::table('quick_contact_infos')->insert(array_merge($info, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 