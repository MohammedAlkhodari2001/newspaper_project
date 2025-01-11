<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class AuthorController extends Controller
{
    public function dashboard()
    {
        // Ensure only Authers can access this
        if (Auth::check() && Auth::user()->utype === 'AUTHER') {
            return view('Auther.dashboard');
        }

        return redirect()->route('index')->with('error', 'Unauthorized Access!');
    }
}
