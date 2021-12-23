<?php

use App\Http\Controllers\IniciarController;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->get('/', function () {
    if (config('sistema.login')) {
        return view('login');
    } else {
        return view('auth.login');
    }
});

Route::get('/iniciar', [IniciarController::class, 'iniciar'])
->middleware(['auth:sanctum', 'verified'])
->name('iniciar');

// aperturar caja
Route::post('/caja/aperturar', [IniciarController::class, 'aperturar'])
->middleware(['auth:sanctum', 'verified'])
->name('caja.aperturar');

/// seleccionar caja
Route::get('/caja/select', [IniciarController::class, 'editcaja'])
->middleware(['auth:sanctum', 'verified'])
->name('caja.select');

/// selecciona la caja
Route::get('/caja/selected/{caja}', [IniciarController::class, 'cajaselected'])
->middleware(['auth:sanctum', 'verified'])
->name('caja.selected');

/// seleccionar generar ordenes
Route::get('/caja/ordenes', [IniciarController::class, 'generarordenes'])
->middleware(['auth:sanctum', 'verified'])
->name('caja.ordenes');


Route::middleware(['auth:sanctum', 'verified', 'noaperturacaja'])->get('/inicio', function () {
    return view('venta.inicio');
})->name('venta.rapida');


Route::middleware(['auth:sanctum', 'verified', 'noaperturacaja'])->get('/ordenes', function () {
    return view('venta.mesas');
})->name('venta.mesas');

Route::middleware(['auth:sanctum', 'verified', 'noaperturacaja'])->get('/delivery', function () {
    return view('venta.delivery');
})->name('venta.delivery');

Route::middleware(['auth:sanctum', 'verified'])->get('/cambios', function () {
    return view('venta.cambios');
})->name('venta.cambios');


Route::middleware(['auth:sanctum', 'verified'])->get('/categoria', function () {
    return view('categoria.index');
})->name('categoria.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/opcion', function () {
    return view('opcion.index');
})->name('opcion.index');



Route::resource('producto', ProductoController::class)->names('producto');


Route::middleware(['auth:sanctum', 'verified', 'siapertura'])->get('/error-apertura', function () {
    return view('globales.noaperturacaja');
})->name('error-apertura');

Route::middleware(['auth:sanctum', 'verified'])->get('/error/autorizacion', function () {
    abort(401);
})->name('error.autorizacion');

Route::middleware(['auth:sanctum', 'verified'])->get('/error/nodisponible', function () {
    abort(503);
})->name('error.nodisponible');


/// corte de caja
Route::middleware(['auth:sanctum', 'verified'])->get('/corte', function () {
    return view('corte.index');
})->name('corte.index');

// efectivo
Route::middleware(['auth:sanctum', 'verified'])->get('/efectivo/cuentas_banco', function () {
    return view('efectivo.cuentas_banco');
})->name('efectivo.cuentas');

Route::middleware(['auth:sanctum', 'verified'])->get('/efectivo/categorias', function () {
    return view('efectivo.categorias');
})->name('efectivo.categorias');

Route::middleware(['auth:sanctum', 'verified'])->get('/efectivo/remesas', function () {
    return view('efectivo.remesas');
})->name('efectivo.remesas');

Route::middleware(['auth:sanctum', 'verified'])->get('/efectivo/gastos', function () {
    return view('efectivo.gastos');
})->name('efectivo.gastos');



//// HISTORIALES
Route::middleware(['auth:sanctum', 'verified'])->get('/historial/reporte', function () {
    return view('historial.reporte');
})->name('historial.reporte');

Route::middleware(['auth:sanctum', 'verified'])->get('/historial/ventas', function () {
    return view('historial.ventas');
})->name('historial.ventas');

Route::middleware(['auth:sanctum', 'verified'])->get('/historial/gastos', function () {
    return view('historial.gastos');
})->name('historial.gastos');

Route::middleware(['auth:sanctum', 'verified'])->get('/historial/cortes', function () {
    return view('historial.cortes');
})->name('historial.cortes');

Route::middleware(['auth:sanctum', 'verified'])->get('/historial/meseros', function () {
    return view('historial.meseros');
})->name('historial.meseros');

Route::middleware(['auth:sanctum', 'verified'])->get('/historial/ordenes', function () {
    return view('historial.ordenes');
})->name('historial.ordenes');




/// panel de control
Route::middleware(['auth:sanctum', 'verified'])->get('/panel/control', function () {
    return view('panel.control');
})->name('panel.control');

Route::middleware(['auth:sanctum', 'verified'])->get('/panel/ordenes', function () {
    return view('panel.ordenes');
})->name('panel.ordenes');

/// mostrar la pantalla
Route::middleware(['sipantalla', 'pantallaauth'])->get('/pantalla', function () {
    return view('panel.pantalla');
})->name('pantalla');
/// login pantalla
Route::middleware(['sipantalla', 'pantallaverified'])->get('/pantalla/login', function () {
    // return view('panel.pantalla-login');
    return view('auth.login');
})->name('pantalla.login');




/// Directorio
Route::middleware(['auth:sanctum', 'verified'])->get('/directorio/clientes', function () {
    return view('directorio.clientes');
})->name('directorio.clientes');

Route::middleware(['auth:sanctum', 'verified'])->get('/directorio/proveedores', function () {
    return view('directorio.proveedores');
})->name('directorio.proveedores');

Route::middleware(['auth:sanctum', 'verified'])->get('/directorio/repartidores', function () {
    return view('directorio.repartidores');
})->name('directorio.repartidores');



/// Configuraciones
Route::middleware(['auth:sanctum', 'verified'])->get('/config/usuarios', function () {
    return view('config.usuarios');
})->name('config.usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/config/configuracion', function () {
    return view('config.configuracion');
})->name('config.configuracion');



/// search 
Route::post('/search', [SearchController::class, 'index'])
->middleware(['auth:sanctum', 'verified'])
->name('search');


/// cuentas por pagar
Route::middleware(['auth:sanctum', 'verified'])->get('/cuentas/pendientes', function () {
    return view('cuentas.pendientes');
})->name('cuentas.pendientes');



/// faturar
Route::middleware(['auth:sanctum', 'verified'])->get('/facturacion/emitidas', function () {
    return view('facturacion.facturas-emitidas');
})->name('facturacion.emitidas');

Route::middleware(['auth:sanctum', 'verified'])->get('/facturacion/ultimas', function () {
    return view('facturacion.facturas-ultimas');
})->name('facturacion.ultimas');



/// MOBILE
Route::middleware(['auth:sanctum', 'verified'])->get('/mobil/inicio', function () {
    return view('comandero.inicio');
})->name('comandero');
Route::middleware(['auth:sanctum', 'verified'])->get('/mobil', function () {
    return view('comandero.mesas');
})->name('comandero.mesas');
Route::middleware(['auth:sanctum', 'verified'])->get('/mobil/cambios', function () {
    return view('comandero.cambios');
})->name('comandero.cambios');
Route::get('/mobil/login', function () {
    session(['comandero' => true]);
    return view('comandero.login');
})->name('comandero.login');