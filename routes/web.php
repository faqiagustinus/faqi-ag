<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CaesarController;
use App\Http\Controllers\MahasiswaController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', [AuthController::class, 'index']);
Route::post('/simpan-pengguna', [AuthController::class, 'create']);

Route::get('/caesar/{jenis?}', [CaesarController::class, 'index']);
Route::post('/caesar-process', [CaesarController::class, 'process']);
Route::post('/caesar-process-json', [CaesarController::class, 'processJson']);

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/pengguna/{user}/edit', [AuthController::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/{user}', [AuthController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{user}', [AuthController::class, 'destroy'])->name('pengguna.destroy');
Route::get('/pengguna/create', [AuthController::class, 'createForm'])->name('pengguna.create');
Route::post('/pengguna', [AuthController::class, 'store'])->name('pengguna.store');