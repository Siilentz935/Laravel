<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\TemplateController;
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
Route::get('/registerUsuario',[TemplateController::class,'registerUsuario'])->name('registerUsuario');
Route::post('/registerUsuarios',[TemplateController::class,'insertUsuario'])->name('insertUsuario');
Route::get('/Usuario/{idUsuarios}',[TemplateController::class,'getUsuario'])->name('getUsuario');
Route::post('/Usuario',[TemplateController::class,'updateUsuario'])->name('updateUsuario');
Route::post('/Usuarios/{idUsuarios}',[TemplateController::class,'borrarUsuario'])->name('borrarUsuario');
Route::get('/Usuarios',[TemplateController::class,'getUsuarios'])->name('getUsuarios');

//Ejemplos
Route::get('/createComics',[TemplateController::class,'createComic'])->name('createComics');
Route::post('/createComics',[TemplateController::class,'insertComic'])->name('insertComic');
Route::get('/detailComic/{id}',[TemplateController::class,'getComic'])->name('getComic');
Route::post('/update/{id}',[TemplateController::class,'updateComic'])->name('updateComic');
Route::get('/comics',[TemplateController::class,'comicsAction'])->name('comics');
Route::post('/',[TemplateController::class,'formularioValidar'])->name('formularioValidar');
Route::get('/',[TemplateController::class,'formularioVista'])->name('formularioVista');
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

