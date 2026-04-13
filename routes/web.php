<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/daftar_pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/tambah_pengguna', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/store', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('/edit/{user}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::put('/update/{user}', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/delete/{user}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');