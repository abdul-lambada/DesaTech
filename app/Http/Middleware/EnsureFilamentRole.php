<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureFilamentRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (!$user || !$user->hasAnyRole([
            'Administrator',
            'Kepala Desa',
            'Sekretaris Desa',
            'Operator Desa',
            'Kepala Dusun',
            'Petugas Keuangan',
            'Moderator Konten',
        ])) {
            abort(403, 'Anda tidak memiliki akses ke panel admin.');
        }
        return $next($request);
    }
}
