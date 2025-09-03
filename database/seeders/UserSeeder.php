<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users with specific roles

        // 1. Administrator (Super Admin)
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('Administrator');

        // 2. Kepala Desa
        $kepalaDesa = User::create([
            'name' => 'Budi Santoso',
            'email' => 'kepaladesa@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $kepalaDesa->assignRole('Kepala Desa');

        // 3. Sekretaris Desa
        $sekretaris = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'sekretaris@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $sekretaris->assignRole('Sekretaris Desa');

        // 4. Operator Desa
        $operator = User::create([
            'name' => 'Ahmad Wijaya',
            'email' => 'operator@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $operator->assignRole('Operator Desa');

        // 5. Kepala Dusun
        $kadus = User::create([
            'name' => 'Rahmat Hidayat',
            'email' => 'kadus@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $kadus->assignRole('Kepala Dusun');

        // 6. Petugas Keuangan
        $keuangan = User::create([
            'name' => 'Dewi Kartika',
            'email' => 'keuangan@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $keuangan->assignRole('Petugas Keuangan');

        // 7. Moderator Konten
        $moderator = User::create([
            'name' => 'Fajar Pratama',
            'email' => 'moderator@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $moderator->assignRole('Moderator Konten');

        // 8. Warga (Sample users)
        $warga1 = User::create([
            'name' => 'Warga Sample 1',
            'email' => 'warga1@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $warga1->assignRole('Warga');

        $warga2 = User::create([
            'name' => 'Warga Sample 2',
            'email' => 'warga2@desatech.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $warga2->assignRole('Warga');

        // 9. Test User (for testing purposes)
        $testUser = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $testUser->assignRole('Warga');

        // Create additional village officials
        $additionalOfficials = [
            [
                'name' => 'Kepala Desa Muda',
                'email' => 'kepaladesa2@desatech.id',
                'role' => 'Kepala Desa'
            ],
            [
                'name' => 'Sekretaris Desa Muda',
                'email' => 'sekretaris2@desatech.id',
                'role' => 'Sekretaris Desa'
            ],
            [
                'name' => 'Operator Desa Muda',
                'email' => 'operator2@desatech.id',
                'role' => 'Operator Desa'
            ],
        ];

        foreach ($additionalOfficials as $official) {
            $user = User::create([
                'name' => $official['name'],
                'email' => $official['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $user->assignRole($official['role']);
        }

        // Create additional warga users
        for ($i = 3; $i <= 10; $i++) {
            $warga = User::create([
                'name' => "Warga Sample {$i}",
                'email' => "warga{$i}@desatech.id",
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $warga->assignRole('Warga');
        }
    }
}
