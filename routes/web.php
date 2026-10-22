<?php

use App\Http\Controllers\IniciarController;
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

Route::get('/nueva-version', function () {
    return view('nueva-version');
})->name('nueva-version');



Route::get('/iniciar', [IniciarController::class, 'iniciar'])
->middleware(['auth:sanctum', 'verified'])
->name('iniciar');


// Inhabilitadas: rutas publicas (guest) que no se usaran
// Route::get('/set-td/{td?}', \App\Http\Controllers\RestablecerTdController::class)
// ->middleware(['guest'])
// ->name('set-td');


// Route::get('/set-latam', \App\Http\Controllers\SetLatamController::class)
// ->middleware(['guest'])
// ->name('set-latam');


// Route::get('/optimize', \App\Http\Controllers\OptimizeController::class)
// ->middleware(['guest'])
// ->name('optimize');



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


Route::get('/status', function () {
    return response()->json([
        'active' => true,
        'env' => config('app.env'),
        'debug' => config('app.debug'),
        'url' => config('app.url'),
        'ip' => request()->ip(),
        'timestamp' => now()->toDateTimeString(),
    ]);
});

