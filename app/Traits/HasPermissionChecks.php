<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasPermissionChecks
{
    /**
     * Check if the authenticated user has a specific permission
     */
    protected function hasPermission(string $permission): bool
    {
        return Auth::check() && Auth::user()->hasPermissionTo($permission);
    }

    /**
     * Check if the authenticated user has any of the given permissions
     */
    protected function hasAnyPermission(array $permissions): bool
    {
        return Auth::check() && Auth::user()->hasAnyPermission($permissions);
    }

    /**
     * Check if the authenticated user has all of the given permissions
     */
    protected function hasAllPermissions(array $permissions): bool
    {
        return Auth::check() && Auth::user()->hasAllPermissions($permissions);
    }

    /**
     * Check if the authenticated user has a specific role
     */
    protected function hasRole(string $role): bool
    {
        return Auth::check() && Auth::user()->hasRole($role);
    }

    /**
     * Check if the authenticated user has any of the given roles
     */
    protected function hasAnyRole(array $roles): bool
    {
        return Auth::check() && Auth::user()->hasAnyRole($roles);
    }

    /**
     * Get the authenticated user's roles
     */
    protected function getUserRoles(): array
    {
        return Auth::check() ? Auth::user()->getRoleNames()->toArray() : [];
    }

    /**
     * Get the authenticated user's permissions
     */
    protected function getUserPermissions(): array
    {
        return Auth::check() ? Auth::user()->getAllPermissions()->pluck('name')->toArray() : [];
    }
} 