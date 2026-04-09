<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CaesarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

Route::get('/login', [PenggunaController::class, 'loginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);
Route::get('/dashboard', [PenggunaController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

Route::get('/index', [PenggunaController::class, 'index']);
Route::post('/simpan-pengguna', [PenggunaController::class, 'create']);

Route::get('/caesar/{jenis?}', [CaesarController::class, 'index']);
Route::post('/caesar-process', [CaesarController::class, 'process']);
Route::post('/caesar-process-json', [CaesarController::class, 'processJson']);
