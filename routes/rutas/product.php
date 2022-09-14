<?php

use App\Http\Controllers\EfectivoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;




                    
Route::middleware(['auth:sanctum', 'sessiones'])->get('/categoria', function () {
    return view('categoria.index');
})->name('categoria.index');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/opcion', function () {
    return view('opcion.index');
})->name('opcion.index');

Route::resource('producto', ProductoController::class)->names('producto')->middleware(['auth:sanctum', 'sessiones']);



/// corte de caja
Route::middleware(['auth:sanctum', 'sessiones'])->get('/corte', function () {
    return view('corte.index');
})->name('corte.index');



// efectivo
Route::middleware(['auth:sanctum', 'sessiones'])->get('/efectivo/cuentas_banco', function () {
    return view('efectivo.cuentas_banco');
})->name('efectivo.cuentas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/efectivo/categorias', function () {
    return view('efectivo.categorias');
})->name('efectivo.categorias');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/efectivo/remesas', function () {
    return view('efectivo.remesas');
})->name('efectivo.remesas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/efectivo/gastos', function () {
    return view('efectivo.gastos');
})->name('efectivo.gastos');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/efectivo/movimientos', function () {
    return view('efectivo.ingreso');
})->name('efectivo.ingreso');

Route::get('/efectivo/transacciones', [EfectivoController::class, 'transacciones'])
->middleware(['auth:sanctum', 'sessiones'])
->name('efectivo.transacciones');


/// Directorio
Route::middleware(['auth:sanctum', 'sessiones'])->get('/directorio/clientes', function () {
    return view('directorio.clientes');
})->name('directorio.clientes');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/directorio/proveedores', function () {
    return view('directorio.proveedores');
})->name('directorio.proveedores');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/directorio/repartidores', function () {
    return view('directorio.repartidores');
})->name('directorio.repartidores');


/// cuentas por pagar
Route::middleware(['auth:sanctum', 'sessiones'])->get('/cuentas/pendientes', function () {
    return view('cuentas.pendientes');
})->name('cuentas.pendientes');


/// PDF's
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);