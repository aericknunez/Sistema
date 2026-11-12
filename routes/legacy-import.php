<?php

use App\Http\Controllers\LegacyImportController;
use Illuminate\Support\Facades\Route;

/*
| TEMPORAL (migracion a connect). Solo lectura, protegidas con x-token (LegacyImportToken).
| Prefijo: api/legacy-import. Se borran al terminar la migracion de los tenants.
*/

Route::get('/menu', [LegacyImportController::class, 'menu']);
Route::get('/clients', [LegacyImportController::class, 'clients']);
Route::get('/users', [LegacyImportController::class, 'users']);
Route::get('/panels', [LegacyImportController::class, 'panels']);
Route::get('/tables', [LegacyImportController::class, 'tables']);
Route::get('/credits', [LegacyImportController::class, 'credits']);
