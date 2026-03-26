<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CaesarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================
// 🔐 LOGIN MANUAL
// =======================

// halaman login
Route::get('/login', [PenggunaController::class, 'loginForm'])->name('login');

// proses login
Route::post('/login', [PenggunaController::class, 'login']);

// dashboard (sudah dicek session di controller)
Route::get('/dashboard', [PenggunaController::class, 'dashboard'])->name('dashboard');

// logout
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');


// =======================
// 👤 PENGGUNA
// =======================

// halaman contoh
Route::get('/halo-maba-sti', [PenggunaController::class, 'index']);

// simpan pengguna (kalau kamu pakai form)
Route::post('/simpan-pengguna', [PenggunaController::class, 'create']);


// =======================
// 🔐 CAESAR CIPHER
// =======================

// halaman utama caesar
Route::get('/caesar/{jenis?}', [CaesarController::class, 'index']);

// proses form biasa
Route::post('/caesar-process', [CaesarController::class, 'process']);

// proses via JSON (API-like)
Route::post('/caesar-process-json', [CaesarController::class, 'processJson']);
Route::post('/caesar-process', [CaesarController::class, 'process']);


// =======================
// 🚀 DEFAULT REDIRECT
// =======================

// kalau buka "/" langsung ke login
Route::get('/', function () {
    return redirect('/login');
    });
