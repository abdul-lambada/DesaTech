<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Clear related tables first to avoid foreign key constraint errors
        DB::table('model_has_roles')->delete();
        DB::table('model_has_permissions')->delete();
        DB::table('role_has_permissions')->delete();
        Role::query()->delete();
        Permission::query()->delete();

        // Create permissions
        $permissions = [
            // User Management
            'manage_users',
            'view_users',
            
            // Dashboard & Reports
            'view_dashboard',
            'view_reports',
            'view_summaries',
            
            // Document Management
            'manage_documents',
            'approve_documents',
            'view_documents',
            'create_documents',
            'edit_documents',
            'delete_documents',
            
            // Population Data
            'manage_population_data',
            'view_population_data',
            'input_population_data',
            'update_population_data',
            'validate_population_data',
            
            // Financial Data
            'manage_financial_data',
            'view_financial_data',
            'input_financial_data',
            'view_budget',
            'manage_budget',
            
            // Content Management
            'manage_content',
            'manage_news',
            'manage_gallery',
            'manage_events',
            'manage_announcements',
            
            // Letter Services
            'manage_letter_services',
            'process_letter_requests',
            'view_letter_requests',
            'approve_letter_requests',
            
            // System Configuration
            'manage_system_config',
            'manage_templates',
            'manage_website_theme',
            'manage_backup',
            
            // Public Access
            'view_public_content',
            'submit_letter_request',
            'view_own_requests',
            
            // Regional Data Access
            'view_regional_data',
            'manage_regional_data',
            
            // Contact Management
            'manage_contacts',
            'view_contacts',
            'respond_contacts',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        
        // 1. Administrator (Super Admin)
        $adminRole = Role::firstOrCreate(['name' => 'Administrator']);
        $adminRole->givePermissionTo(Permission::all());

        // 2. Kepala Desa
        $kepalaDesaRole = Role::firstOrCreate(['name' => 'Kepala Desa']);
        $kepalaDesaRole->givePermissionTo([
            'view_dashboard',
            'view_reports',
            'view_summaries',
            'approve_documents',
            'view_documents',
            'view_financial_data',
            'view_budget',
            'view_population_data',
            'view_public_content',
            'view_contacts',
        ]);

        // 3. Sekretaris Desa
        $sekretarisRole = Role::firstOrCreate(['name' => 'Sekretaris Desa']);
        $sekretarisRole->givePermissionTo([
            'view_dashboard',
            'view_reports',
            'manage_documents',
            'approve_documents',
            'view_documents',
            'create_documents',
            'edit_documents',
            'manage_population_data',
            'view_population_data',
            'input_population_data',
            'update_population_data',
            'validate_population_data',
            'manage_financial_data',
            'view_financial_data',
            'input_financial_data',
            'view_budget',
            'manage_budget',
            'manage_content',
            'manage_news',
            'manage_gallery',
            'manage_events',
            'manage_announcements',
            'manage_letter_services',
            'process_letter_requests',
            'view_letter_requests',
            'approve_letter_requests',
            'view_public_content',
            'manage_contacts',
            'view_contacts',
            'respond_contacts',
        ]);

        // 4. Operator Desa
        $operatorRole = Role::firstOrCreate(['name' => 'Operator Desa']);
        $operatorRole->givePermissionTo([
            'view_dashboard',
            'manage_population_data',
            'view_population_data',
            'input_population_data',
            'update_population_data',
            'manage_letter_services',
            'process_letter_requests',
            'view_letter_requests',
            'manage_content',
            'manage_news',
            'manage_gallery',
            'manage_events',
            'manage_announcements',
            'view_public_content',
            'respond_contacts',
        ]);

        // 5. Kepala Dusun / RT / RW
        $kadusRole = Role::firstOrCreate(['name' => 'Kepala Dusun']);
        $kadusRole->givePermissionTo([
            'view_dashboard',
            'view_regional_data',
            'manage_regional_data',
            'view_population_data',
            'validate_population_data',
            'input_population_data',
            'update_population_data',
            'view_letter_requests',
            'approve_letter_requests',
            'view_public_content',
        ]);

        // 6. Warga / Penduduk
        $wargaRole = Role::firstOrCreate(['name' => 'Warga']);
        $wargaRole->givePermissionTo([
            'view_public_content',
            'submit_letter_request',
            'view_own_requests',
        ]);

        // 7. Petugas Keuangan
        $keuanganRole = Role::firstOrCreate(['name' => 'Petugas Keuangan']);
        $keuanganRole->givePermissionTo([
            'view_dashboard',
            'view_reports',
            'manage_financial_data',
            'view_financial_data',
            'input_financial_data',
            'view_budget',
            'manage_budget',
            'view_population_data',
            'view_public_content',
        ]);

        // 8. Moderator Konten
        $moderatorRole = Role::firstOrCreate(['name' => 'Moderator Konten']);
        $moderatorRole->givePermissionTo([
            'view_dashboard',
            'manage_content',
            'manage_news',
            'manage_gallery',
            'manage_events',
            'manage_announcements',
            'view_public_content',
            'view_contacts',
            'respond_contacts',
        ]);
    }
} 