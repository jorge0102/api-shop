<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if(in_array(Auth::user()->role_name, explode('|', $role)))
            return $next($request);

        return response()->json([
            'message' => 'Not authorized'
        ], 401);
    }
}
