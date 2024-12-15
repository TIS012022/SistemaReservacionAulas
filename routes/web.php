<?php

use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UsuariosRController;
use Illuminate\Support\Facades\Route;

use app\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MateriaController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
  return view('index');
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

Route::get('/aulas/create', [App\Http\Controllers\AulaController::class, 'create'])
->name('admin.aulas.create');

Route::delete('/aulas/{aulaId}/delete', [App\Http\Controllers\AulaController::class, 'delete'])
->name('admin.aulas.delete');


Route::post('/aulas/{aulaId}/update', [App\Http\Controllers\AulaController::class, 'update'])
->name('admin.aulas.update');


Route::get('/grupos', [App\Http\Controllers\SolicitudController::class, 'getGrupos']);

//Delete para aulas reservadas
Route::delete('/aulasR/{aulaId}/deleteReservadas', [App\Http\Controllers\AulaController::class, 'deleteReservadas'])
->name('admin.aulasR.delete');




Route::get('/cantidades', [App\Http\Controllers\SolicitudController::class, 'getCantidades']);


Route::resource('materias', MateriaController::class, [
  'names' => [
    'index' => 'materias'
  ]
])->middleware('auth.user');

Route::post('/materias/store', [App\Http\Controllers\MateriaController::class, 'store'])
->name('admin.materias.store');

Route::post('/materias/{materiaId}/update', [App\Http\Controllers\MateriaController::class, 'update'])
->name('admin.materias.update');

Route::get('/statusnoticia', [App\Http\Controllers\MateriaController::class, 'UpdateStatusNoti']);



Route::get('/sectoresaulas', [App\Http\Controllers\SolicitudController::class, 'getAulas']);


//usuarios
Route::get('/usuarios/index', [App\Http\Controllers\UsuariosRController::class, 'index'])
 ->name('admin.usuarios.index');

 Route::get('/usuarios/create', [App\Http\Controllers\UsuariosRController::class, 'create'])
 ->name('admin.usuarios.create');

 Route::post('/usuarios/store', [App\Http\Controllers\UsuariosRController::class, 'store'])
->name('admin.usuarios.store');

Route::delete('/usuarios/{user}', [App\Http\Controllers\UsuariosRController::class, 'destroy'])
->name('admin.usuarios.delete');

Route::get('/usuarios/{user}/edit', [App\Http\Controllers\UsuariosRController::class, 'edit'])
->name('admin.usuarios.edit');

Route::put('/usuarios/{user}', [App\Http\Controllers\UsuariosRController::class, 'update'])
->name('admin.usuarios.update');

//roles
Route::get('/rols/index', [App\Http\Controllers\RoleController::class, 'index'])
 ->name('admin.rols.index');

 Route::post('/rols/store', [App\Http\Controllers\RoleController::class, 'store'])
->name('admin.rols.store');

Route::delete('/rols/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'delete'])
->name('admin.rols.delete');

Route::post('/rols/{roleId}/update', [App\Http\Controllers\RoleController::class, 'update'])
->name('admin.rols.update');

//permisos
Route::group(['middleware' => 'auth'], function() {
  Route::resource('permissions', App\Http\Controllers\PermissionController::class);
  Route::resource('roles', App\Http\Controllers\RoleController::class);
});

//Materias de docentes
Route::get('/docentesmaterias', [App\Http\Controllers\DocmateriaController::class, 'index2'])
 ->name('admin.docMaterias.index');

Route::post('/docentesmaterias/store', [App\Http\Controllers\DocmateriaController::class, 'store'])
 ->name('admin.docentesmaterias.store');

Route::post('/docentesmaterias/{docmateriaId}/update', [App\Http\Controllers\DocmateriaController::class, 'update'])
 ->name('admin.docentesmaterias.update');

 Route::delete('/docentesmaterias/{docmateriaId}/delete', [App\Http\Controllers\DocmateriaController::class, 'delete'])
->name('admin.docentesmaterias.delete');

 //Grupos
Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'index'])
->name('admin.grupos.index');

Route::post('/grupos/store', [App\Http\Controllers\GrupoController::class, 'store'])
->name('admin.grupos.store');

Route::post('/grupos/{grupoId}/update', [App\Http\Controllers\GrupoController::class, 'update'])
->name('admin.grupos.update');

Route::delete('/grupos/{grupoId}/delete', [App\Http\Controllers\GrupoController::class, 'delete'])
->name('admin.grupos.delete');
