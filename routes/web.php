<?php

use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

use app\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\Controller;



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
  return view('welcome');
});

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
->name('register.store');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');


Route::post('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'store'])
->name('admin.registerAdminStore');

Route::get('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'create'])
->middleware('guest')
->name('admin.registerAdmin');


Route::get('/login', [App\Http\Controllers\SessionsController::class, 'create'])
->middleware('guest')
->name('login.index');

Route::post('/login', [App\Http\Controllers\SessionsController::class, 'store'])
->name('login.store');

Route::get('/logout', [App\Http\Controllers\SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');



Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/docente', [App\Http\Controllers\UserController::class, 'index'])
->middleware('auth.user')
->name('user.index');

Route::get('/auth', function () {
  return view('layouts.dashboard.index');
})->middleware('auth.user')
->name('auth.user');


// Auth::routes();

//seed database with data
// Route::resource('aula', ReservaController::class);
// Route::resource('materia', ReservaController::class);
// Route::resource('grupo', ReservaController::class);

Route::resource('solicitudes', SolicitudController::class, [
  'names' => [
    'index' => 'solicitudes',
    'create' => 'solicitudes.create'
  ]
])->middleware('auth.user');

Route::resource('notificaciones', NotificacionController::class, [
  'names' => [
    'index' => 'notificaciones',
    'store' => 'notificaciones.store'
  ]
])->middleware('auth.user');

Route::resource('aulas', AulaController::class, [
  'names' => [
    'index' => 'aulas'
  ]
])->middleware('auth.user');



Route::post('/aulas/store', [App\Http\Controllers\AulaController::class, 'store'])
->name('admin.aulas.store');

Route::delete('/aulas/{aulaId}/delete', [App\Http\Controllers\AulaController::class, 'delete'])
->name('admin.aulas.delete');


Route::post('/aulas/{aulaId}/update', [App\Http\Controllers\AulaController::class, 'update'])
->name('admin.aulas.update');


Route::get('/grupos', [App\Http\Controllers\SolicitudController::class, 'getGrupos']);

//Delete para aulas reservadas
Route::delete('/aulasR/{aulaId}/deleteReservadas', [App\Http\Controllers\AulaController::class, 'deleteReservadas'])
->name('admin.aulasR.delete');

Route::get('select', [App\Http\Controllers\AulaController::class, 'select']);

