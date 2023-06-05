<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LogsController;
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
//Tercer Parcial
Route::middleware(['web', 'auth'])->group(function () {
Route::get('/bitacoras',[TemplateController::class,'getBitacoraUsuarios'])->name('bitacoras');
Route::get('/registerUsuario',[TemplateController::class,'registerUsuario'])->name('registerUsuario');
Route::post('/registerUsuarios',[TemplateController::class,'insertUsuario'])->name('insertUsuario');
Route::get('/Usuario/{idUsuarios}',[TemplateController::class,'getUsuario'])->name('getUsuario');
Route::post('/Usuario',[TemplateController::class,'updateUsuario'])->name('updateUsuario');
Route::post('/Usuarios/{idUsuarios}',[TemplateController::class,'borrarUsuario'])->name('borrarUsuario');
Route::get('/Usuarios',[TemplateController::class,'getUsuarios'])->name('getUsuarios');
//Final
Route::get('/tabs', [LogsController::class,'getLogs'])->name('logs');
Route::get('/logout', [TemplateController::class, 'logout'])->name('logout');
Route::get('/dashboard',[LogsController::class,'getDashboard'])->name('getDashboard');
Route::get('/actualizarAlert/{id}',[LogsController::class,'updateAlert'])->name('updateAlert');
Route::post('/usuarioActualizado',[LogsController::class,'postUpdateAlert'])->name('postUpdateAlert');
});
Route::get('/',[TemplateController::class,'getLogin'])->name('getLogin');
Route::post('/login',[TemplateController::class,'formularioValidar'])->name('login');
Route::get('/login',[TemplateController::class,'formularioVista'])->name('login.submit');

//Ejemplos
Route::get('/createComics',[TemplateController::class,'createComic'])->name('createComics');
Route::post('/createCoics',[TemplateController::class,'insertComic'])->name('insertComic');
Route::get('/detailComic/{id}',[TemplateController::class,'getComic'])->name('getComic');
Route::post('/update/{id}',[TemplateController::class,'updateComic'])->name('updateComic');
Route::get('/comics',[TemplateController::class,'comicsAction'])->name('comics');
Route::get('/VIP',[TemplateController::class,'inicioVIPaction'])->name('VIP');
Route::get('/form',[TemplateController::class,'formularioVista'])->name('formulario');
Route::post('/form',[TemplateController::class,'formularioValidar'])->name('datosUsuario');
Route:: get('/home',
[PruebaController::class,'indexAction'])->name('home');


Route::get('/arr',[PruebaController:: class,'arregloAction'])->name('arreglo');

Route::get('/with',
[PruebaController:: class,'conAction'])->name('con');
Route::get('/param/{name}/{apellido1?}/{apellido2?}',[PruebaController:: class,'parametroAction']
)->where(['name' => '[a-zA-Z0-9]+',

        ])->name('parametro');

