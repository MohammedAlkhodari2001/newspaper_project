<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/set-timezone', function (Illuminate\Http\Request $request) {
    session(['user_timezone' => $request->timezone]);
    return response()->json(['message' => 'Timezone set']);
});
// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


require __DIR__.'/auth.php';
