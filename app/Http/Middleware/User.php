<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Memastikan pengguna sudah login
        if (Auth::check()) {
            // Memeriksa apakah pengguna memiliki role yang sesuai
            if (Auth::user()->role === $role) {
                return $next($request);
            } else {
                // Jika role tidak sesuai, redirect ke halaman lain (misalnya dashboard)
                return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        // Jika tidak login, arahkan ke halaman login
        return redirect('login');

        return $next($request);
    }
}
