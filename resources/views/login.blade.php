<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaesarController;


// halaman login
Route::get('/', function () {
    return view('login');
});


Route::get('/login', function () {
    return view('login');
});

        
// halaman dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

   
Route::get('/caesar', [CaesarController::class, 'index']);
Route::post('/caesar/process', [CaesarController::class, 'process']);