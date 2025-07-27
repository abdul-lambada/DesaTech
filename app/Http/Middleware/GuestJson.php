<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestJson
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($request->expectsJson() || $request->isJson() || $request->wantsJson() || $request->header('Accept') === 'application/json') {
                    return response()->json([
                        'message' => 'Already authenticated',
                        'user' => Auth::user(),
                        'redirect' => '/dashboard',
                    ], 200);
                }
                return redirect('/dashboard');
            }
        }
        return $next($request);
    }
} 