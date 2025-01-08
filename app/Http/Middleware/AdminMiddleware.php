<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if (Auth::check() && Auth::user()->utype === 'ADMIN') {
            return $next($request);  // Allow access to the admin page
        }

        // Redirect non-admins to homepage
        return redirect()->route('index')->with('error', 'Unauthorized Access!');
    }
}
