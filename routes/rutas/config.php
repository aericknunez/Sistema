<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;



// erorres
Route::middleware(['auth:sanctum', 'sessiones', 'siapertura'])->get('/error-apertura', function () {
    return view('globales.noaperturacaja');
})->name('error-apertura');

Route::middleware(['auth:sanctum'])->get('/error/autorizacion', function () {
    abort(401);
})->name('error.autorizacion');

Route::middleware(['auth:sanctum'])->get('/error/nodisponible', function () {
    abort(503);
})->name('error.nodisponible');





/// Configuraciones
Route::middleware(['auth:sanctum', 'sessiones'])->get('/config/usuarios', function () {
    return view('config.usuarios');
})->name('config.usuarios');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/config/configuracion', function () {
    return view('config.configuracion');
})->name('config.configuracion');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/config/opciones', function () {
    return view('config.opciones');
})->name('config.opciones');

Route::resource('roles', RoleController::class)->names('roles');


/// search 
Route::post('/search', [SearchController::class, 'index'])
->middleware(['auth:sanctum', 'sessiones'])
->name('search');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/search', function () {
    return view('search.index');
})->name('searched');




/// mostrar la pantalla
Route::middleware(['sipantalla', 'pantallaauth', 'auth:sanctum', 'sessiones'])->get('/pantalla', function () {
    return view('panel.pantalla');
})->name('pantalla');
/// login pantalla
Route::middleware(['sipantalla', 'pantallaverified'])->get('/pantalla/login', function () {
    // return view('panel.pantalla-login');
    return view('auth.login');
})->name('pantalla.login');


/// Pagos
Route::middleware(['auth:sanctum', 'sessiones'])->get('/pay', function () {
    return view('pay.index');
})->name('pay.index');
