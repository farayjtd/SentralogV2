<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!in_array(auth()->user()->role, $roles)) {
            // Kalau sudah login tapi salah role, redirect ke dashboard mereka
            $roleRoutes = [
                'admin'       => 'admin.dashboard',
                'owner'       => 'owner.dashboard',
                'engineering' => 'engineering.dashboard',
                'kepala_wh'   => 'kepala-wh.dashboard',
                'sopir'       => 'sopir.dashboard',
                'mandor'      => 'mandor.dashboard',
                'tukang'      => 'tukang.dashboard',
            ];
            $route = $roleRoutes[auth()->user()->role] ?? 'login';
            return redirect()->route($route)->with('error', 'Akses ditolak.');
        }

        return $next($request);
    }
}