<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must log in to access this page.');
        }

        // Check if the user type matches the required role
        if (strcasecmp(Auth::user()->type, $role) === 0) {
            return $next($request);  // Allow access if user type matches
        }

        // Redirect unauthorized users
        return redirect('/')->with('error', 'Unauthorized Access!');
    }
}
