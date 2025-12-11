<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserOnly
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('login')->with('error', 'Akses ditolak, khusus pengguna.');
        }

        return $next($request);
    }
}
