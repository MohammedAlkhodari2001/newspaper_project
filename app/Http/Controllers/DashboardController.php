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
            $userType = Auth::user()->type;  // Use a single attribute consistently

            if ($userType === 'ADMIN') {
                return redirect()->route('admin.posts');  // Redirect to the admin posts page
            }
            elseif ($userType === 'SUPPORT_IT') {
                return redirect()->route('support.users');  // Redirect to the support users page
            }

            return redirect()->route('index');  // Redirect normal users to home page
        }

        return redirect()->route('login');  // If not authenticated, redirect to login
    }
}
