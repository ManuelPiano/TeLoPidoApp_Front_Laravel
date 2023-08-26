<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [CotizacionController::class, 'index']);
Route::post('/cotizacion/calculate', [CotizacionController::class, 'calculate'])->name('cotizacion.calculate');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
