<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class ListRolesPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all roles and their permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roles = Role::with('permissions')->get();

        if ($roles->isEmpty()) {
            $this->info('No roles found. Run the RolePermissionSeeder first.');
            return 0;
        }

        $this->info('Roles and Permissions:');
        $this->newLine();

        foreach ($roles as $role) {
            $this->info("🔹 {$role->name}");
            
            $permissions = $role->permissions->pluck('name')->toArray();
            if (empty($permissions)) {
                $this->line('   No permissions assigned');
            } else {
                foreach ($permissions as $permission) {
                    $this->line("   ✓ {$permission}");
                }
            }
            
            $this->newLine();
        }

        return 0;
    }
} 