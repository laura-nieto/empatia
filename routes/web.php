<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DatosDemograficosController;
use App\Http\Controllers\MensajeController;


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
    return view('index');
})->middleware('auth');

// LOGIN - LOG-OUT
Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::post('/login',[UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logOut']);

//NEW EMPRESA
Route::get('/new/empresa',[EmpresaController::class,'create'])->middleware('auth');
Route::post('/new/empresa',[EmpresaController::class,'store'])->middleware('auth');

//NEW DATO
Route::get('/new/dato',[DatosDemograficosController::class,'create'])->middleware('auth');
Route::post('/new/dato',[DatosDemograficosController::class,'store'])->middleware('auth');

//EDIT MESSAGE
Route::get('/modificar/clima-laboral',[MensajeController::class,'edit'])->middleware('auth');
Route::post('/modificar/clima-laboral',[MensajeController::class,'update'])->middleware('auth');

Route::get('/modificar/desempenio-laboral',[MensajeController::class,'edit'])->middleware('auth');
Route::post('/modificar/desempenio-laboral',[MensajeController::class,'update'])->middleware('auth');
Route::get('/modificar/instrucciones/desempenio-laboral',[MensajeController::class,'mostrar_modificar_instrucciones'])->middleware('auth');
Route::post('/modificar/instrucciones/desempenio-laboral',[MensajeController::class,'modificar_instrucciones'])->middleware('auth');

Route::get('/modificar/automatizacion-laboral',[MensajeController::class,'edit'])->middleware('auth');
Route::post('/modificar/automatizacion-laboral',[MensajeController::class,'update'])->middleware('auth');

//CREAR MESSAGE
Route::get('/crear/clima-laboral',[MensajeController::class,'create'])->middleware('auth');
Route::post('/crear/clima-laboral',[MensajeController::class,'store'])->middleware('auth');
Route::get('/crear/desempenio-laboral',[MensajeController::class,'create'])->middleware('auth');
Route::post('/crear/desempenio-laboral',[MensajeController::class,'store'])->middleware('auth');
Route::get('/crear/automatizacion-laboral',[MensajeController::class,'create'])->middleware('auth');
Route::post('/crear/automatizacion-laboral',[MensajeController::class,'store'])->middleware('auth');

require __DIR__.'/web/automatizacion.php';
require __DIR__.'/web/climaLaboral.php';
require __DIR__.'/web/desempeñoLaboral.php';