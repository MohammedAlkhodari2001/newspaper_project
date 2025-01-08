<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Redirect the user based on their role after login.
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->utype === 'ADMIN') {
                return redirect()->route('admin.posts');  // Redirect to the admin posts page
            }
            return redirect()->route('index');  // Redirect normal users to home page
        }

        return redirect()->route('login');  // If not authenticated, redirect to login
    }
}
