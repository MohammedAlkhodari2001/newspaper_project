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
        // Ensure only SUPPORT_IT can access this
        if (Auth::check() && Auth::user()->type === 'SUPPORT_IT') {
            return view('admin.dashboard');
        }

        return redirect()->route('index')->with('error', 'Unauthorized Access!');
    }
}
