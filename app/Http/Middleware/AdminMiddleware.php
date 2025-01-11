<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $type = 'admin')
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Check if the user is of the correct type
        if (Auth::user()->type !== strtoupper($type)) {
            return redirect()->route('index')->with('error', 'Unauthorized Access!');
        }

        return $next($request);  // Allow access
    }
}
