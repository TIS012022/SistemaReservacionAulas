<?php

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ReservaController;
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

Route::get('/', function () {
    return view('layouts.dashboard.index');
});

Route::get('/solicitudes', function () {
  return view('admin.solicitudes.index');
})->name("solicitudes");


// Auth::routes();

//seed database with data
// Route::resource('aula', ReservaController::class);
// Route::resource('materia', ReservaController::class);
// Route::resource('grupo', ReservaController::class);

// Route::resource('solicitudes', SolicitudController::class);
// Route::resource('reservas', ReservaController::class);
// Route::resource('notificaciones', ReservaController::class);
