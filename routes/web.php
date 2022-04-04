<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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
    return view('home');
});



Route::get('/login', [App\Http\Controllers\SessionsController::class, 'create'])->name('login.index');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])->name('register.index');