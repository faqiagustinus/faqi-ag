<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CipherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [CipherController::class, 'index']);
Route::post('/process', [CipherController::class, 'process'])->name('cipher.process');