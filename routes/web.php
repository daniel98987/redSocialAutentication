<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\redSocial;
use Illuminate\Support\Facades\Auth;
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


Route::view('/', 'auth.login')
->middleware('auth');

Route::get('/profile/{id}', [PublicacionesController::class, 'profile'])

->middleware('auth');

Route::view('/muro', 'muro')
->middleware('auth');

Route::get('/register', [LoginController::class, 'createRegister'])
    ->name('register.index');




Route::post('/register', [LoginController::class, 'postCreateUser'])
    ->name('register.index');







    
Route::get('/login', [LoginController::class, 'create'])
    ->name('login.index');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');









    
Route::get('/amigos', [redSocial::class, 'getAmigosNo'])
->middleware('auth');
Route::post('/amigos/{id}', [redSocial::class, 'addAmigos'])
->middleware('auth');

Route::get('/grupos', function () {
    return view('grupos');
})
->middleware('auth');

Route::get('/logout', [LoginController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

Route::post('/publicacion/create/{id}', [PublicacionesController::class, 'postPublicacion'])
->middleware('auth');

Route::put('publicacion/like/{id}/{idUser}', [PublicacionesController::class, 'putLikesProfile'])
->middleware('auth');

Route::put('publicacion/dislike/{id}/{idUser}', [PublicacionesController::class, 'putDislikesProfile'])
->middleware('auth');
Route::put('publicacion/likeMuro/{id}', [PublicacionesController::class, 'putLikesProfileMuro'])
->middleware('auth');

Route::put('publicacion/dislikeMuro/{id}', [PublicacionesController::class, 'putDislikesProfileMuro'])
->middleware('auth');

Route::put('publicacion/photo/{id}', [PublicacionesController::class, 'putDislikes'])
->middleware('auth');


Route::delete('/publicaciones/{id}/{idUsuario}', [PublicacionesController::class, 'destroy'])
->middleware('auth');

Route::get('/amigos', [redSocial::class, 'getAmigosNo'])
->middleware('auth');
Route::get('/solicitud', [redSocial::class, 'solicitudes'])
->middleware('auth');

Route::delete('/solicitud/deleteConfirmar/{id}', [redSocial::class, 'destroyConfirmar'])

->middleware('auth');
Route::delete('/solicitud/deletePendiente/{id}', [redSocial::class, 'destroyPendiente'])

->middleware('auth');
Route::put('/solicitud/confirmarAmistad/{id}', [redSocial::class, 'confirmarAmistad'])

->middleware('auth');
Route::delete('/solicitud/eliminarAmistad/{id}', [redSocial::class, 'destroyAmistad'])

->middleware('auth');


Route::post('/comentario/{idPublicacion}/{idUsuario}/{idUsuarioConsultado}', [ComentarioController::class, 'postComentario'])
->middleware('auth');
Route::post('/comentario/{idPublicacion}/{idUsuario}', [ComentarioController::class, 'postComentario2'])
->middleware('auth');


Route::post('/comentarioMuro/{idPublicacion}/{idUsuario}', [ComentarioController::class, 'postComentario'])
->middleware('auth');


Route::get('/comentario/{idPublicacion}/{idUsuario}', [ComentarioController::class, 'getComentarios'])
->middleware('auth');
