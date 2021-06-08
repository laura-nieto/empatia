<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DatosDemograficosController;


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
Route::get('/new/dato',[DatosDemograficosController::class,'create']);
Route::post('/new/dato',[DatosDemograficosController::class,'store']);

//EDIT MESSAGE
Route::get('/modificar',function(){
    return view('edit.email');
})->middleware('auth');
Route::post('/modificar',function(Request $request){
   dd($request->editar);
})->middleware('auth');

require __DIR__.'/web/automatizacion.php';
require __DIR__.'/web/climaLaboral.php';
require __DIR__.'/web/desempeñoLaboral.php';