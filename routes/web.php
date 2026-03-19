<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()
        ->withInput($request->only('email'))
        ->withErrors(['email' => 'Email atau password salah.']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/halo-maba-sti', [\App\Http\Controllers\PenggunaController::class, 'index']);
Route::post('/simpan-pengguna', [\App\Http\Controllers\PenggunaController::class, 'create']);
Route::get('/caesar/{jenis?}', [\App\Http\Controllers\CaesarController::class, 'index']);
Route::post('/caesar-process', [\App\Http\Controllers\CaesarController::class, 'process']);
Route::post('/caesar-process-json', [\App\Http\Controllers\CaesarController::class, 'processJson']);
// Route::get('/halo-maba-sti', function () {
//     return 'Halo dek';
// });