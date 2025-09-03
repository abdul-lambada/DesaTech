<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuickContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'type' => 'Telepon',
                'description' => 'Hubungi kami melalui telepon',
                'icon' => 'fas fa-phone',
            ],
            [
                'type' => 'Email',
                'description' => 'Kirim pesan melalui email',
                'icon' => 'fas fa-envelope',
            ],
            [
                'type' => 'WhatsApp',
                'description' => 'Chat melalui WhatsApp',
                'icon' => 'fab fa-whatsapp',
            ],
            [
                'type' => 'Facebook',
                'description' => 'Ikuti kami di Facebook',
                'icon' => 'fab fa-facebook',
            ],
            [
                'type' => 'Instagram',
                'description' => 'Ikuti kami di Instagram',
                'icon' => 'fab fa-instagram',
            ],
        ];

        foreach ($contacts as $contact) {
            DB::table('quick_contacts')->insert(array_merge($contact, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
} 