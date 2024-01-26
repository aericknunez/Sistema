<?php

use App\Http\Controllers\IniciarController;
use App\Http\Controllers\RestablecerTdController;
use App\Http\Controllers\SetLatamController;
use App\Models\ConfigPrivate;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->get('/', function () {

    $priv = ConfigPrivate::first();
    if ($priv) {
        if ($priv->sys_login) return view('login');
            return view('auth.login');
    } 
        return view('auth.login'); 
});

Route::middleware(['guest'])->get('/ingreso', function () {
    return view('login');
})->name('ingreso');



Route::get('/iniciar', [IniciarController::class, 'iniciar'])
->middleware(['auth:sanctum', 'verified'])
->name('iniciar');


Route::get('/set-td/{td?}', RestablecerTdController::class)
->middleware(['guest'])
->name('set-td');


Route::get('/set-latam', SetLatamController::class)
->middleware(['guest'])
->name('set-latam');


// aperturar caja
Route::post('/caja/aperturar', [IniciarController::class, 'aperturar'])
->middleware(['auth:sanctum', 'sessiones'])
->name('caja.aperturar');

/// seleccionar caja
Route::get('/caja/select', [IniciarController::class, 'editcaja'])
->middleware(['auth:sanctum', 'sessiones'])
->name('caja.select');

/// selecciona la caja
Route::get('/caja/selected/{caja}', [IniciarController::class, 'cajaselected'])
->middleware(['auth:sanctum', 'sessiones'])
->name('caja.selected');

/// seleccionar generar ordenes
Route::get('/caja/ordenes', [IniciarController::class, 'generarordenes'])
->middleware(['auth:sanctum', 'sessiones'])
->name('caja.ordenes');


Route::middleware(['auth:sanctum', 'sessiones', 'noaperturacaja'])->get('/inicio', function () {
    return view('venta.inicio');
})->name('venta.rapida');


Route::middleware(['auth:sanctum', 'sessiones', 'noaperturacaja'])->get('/ordenes', function () {
    return view('venta.mesas');
})->name('venta.mesas');

Route::middleware(['auth:sanctum', 'sessiones', 'noaperturacaja'])->get('/delivery', function () {
    return view('venta.delivery');
})->name('venta.delivery');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/cambios', function () {
    return view('venta.cambios');
})->name('venta.cambios');



