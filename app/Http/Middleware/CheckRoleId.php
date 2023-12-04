<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roleId)
    {
        // Periksa apakah pengguna memiliki roleId yang sesuai
        if ($request->user() && $request->user()->roleId == $roleId) {
            return $next($request);
        }
    
        // Jika roleId tidak sesuai, alihkan atau kembalikan sesuai kebutuhan Anda
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
    
}
