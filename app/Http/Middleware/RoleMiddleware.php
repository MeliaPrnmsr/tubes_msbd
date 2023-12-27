<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $allowedRoles = $roles;

        if (Auth::check() && Auth::user() && in_array(Auth::user()->role, $allowedRoles)) {
            DB::setDefaultConnection(Auth::user()->role);
            return $next($request);
        }

        switch (Auth::user()->role) {
            case 'admin':
                return redirect()->route('dashboard.admin');
            case 'staff':
                return redirect()->route('dashboard.staff');
            case 'dosen':
                return redirect()->route('landingpage.dosen');
            case 'mahasiswa':
                return redirect()->route('landingpage.mahasiswa');
            default:
                return redirect()->route('landingpage');
        }
    }
}



