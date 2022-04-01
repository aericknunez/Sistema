<?php

use Illuminate\Support\Facades\Route;




//// HISTORIALES
Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/reporte', function () {
    return view('historial.reporte');
})->name('historial.reporte');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/ventas', function () {
    return view('historial.ventas');
})->name('historial.ventas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/gastos', function () {
    return view('historial.gastos');
})->name('historial.gastos');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/remesas', function () {
    return view('historial.remesas');
})->name('historial.remesas');


Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/cortes', function () {
    return view('historial.cortes');
})->name('historial.cortes');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/meseros', function () {
    return view('historial.meseros');
})->name('historial.meseros');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/ordenes', function () {
    return view('historial.ordenes');
})->name('historial.ordenes');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/eliminadas', function () {
    return view('historial.eliminadas');
})->name('historial.eliminadas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/resumen', function () {
    return view('historial.resumen');
})->name('historial.resumen');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/historial/entradas', function () {
    return view('historial.entradas');
})->name('historial.entradas');




/// panel de control
Route::middleware(['auth:sanctum', 'sessiones'])->get('/panel/control', function () {
    return view('panel.control');
})->name('panel.control');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/panel/ordenes', function () {
    return view('panel.ordenes');
})->name('panel.ordenes');





/// faturar
Route::middleware(['auth:sanctum', 'sessiones'])->get('/facturacion/emitidas', function () {
    return view('facturacion.facturas-emitidas');
})->name('facturacion.emitidas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/facturacion/ultimas', function () {
    return view('facturacion.facturas-ultimas');
})->name('facturacion.ultimas');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/facturacion/reporte', function () {
    return view('facturacion.reporte-mensual');
})->name('facturacion.reporte');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/facturacion/rango', function () {
    return view('facturacion.rango');
})->name('facturacion.rango');


// INVENTARIO
Route::middleware(['auth:sanctum', 'sessiones'])->get('/inventario', function () {
    return view('inventario/index');
})->name('inventario');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/inventario/productos', function () {
    return view('inventario/productos');
})->name('inventario.productos');

Route::middleware(['auth:sanctum', 'sessiones'])->get('/inventario/asignados', function () {
    return view('inventario/asignados');
})->name('inventario.asignados');

