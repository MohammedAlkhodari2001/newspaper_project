<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        // Ensure only admins can access this
        if (Auth::check() && Auth::user()->utype === 'ADMIN') {
            return view('admin.dashboard');
        }

        return redirect()->route('index')->with('error', 'Unauthorized Access!');
    }
}
