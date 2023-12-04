<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->roleId === 1) {
            return $next($request);
        }

        return response()->json(['message' => 'You don\'t have permission to this API'], 401);
    }
}
