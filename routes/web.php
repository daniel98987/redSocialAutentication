<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\redSocial;
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

Route::get('/', function () {
    return view('principal');
})
->middleware('auth');



Route::get('/register', [LoginController::class, 'createRegister'])

    ->name('register.index');
Route::post('/register', [LoginController::class, 'postCreateUser'])

    ->name('register.index');
Route::get('/login', [LoginController::class, 'create'])

    ->name('login.index');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');


Route::get('/amigos', [redSocial::class, 'getAmigos'])
->middleware('auth');
Route::get('/grupos', function () {

    return view('grupos');
})
->middleware('auth');


Route::get('/logout', [LoginController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');
