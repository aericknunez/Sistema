<?php

use App\Http\Controllers\ComanderoController;
use Illuminate\Support\Facades\Route;



/// MOBILE
Route::middleware(['auth:sanctum', 'sessiones'])->get('/mobil', function () {
    return view('comandero.mesas');
})->name('comandero.mesas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/mobil/inicio', function () {
    return view('comandero.inicio');
})->name('comandero');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/mobil/cambios', function () {
    return view('comandero.cambios');
})->name('comandero.cambios');

Route::get('/mobil/login', function () {
    session(['comandero' => true]);
    return view('comandero.login');
})->name('comandero.login');

Route::post('/mobil/logout', [ComanderoController::class, 'logout'])
->middleware(['auth:sanctum', 'sessiones'])->name('comandero.logout');

