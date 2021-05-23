<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;

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
});

// LOGIN - LOG-OUT
Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::post('/login',[UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logOut']);

//NEW EMPRESA
Route::get('/new/empresa',[EmpresaController::class,'create']);
Route::post('/new/empresa',[EmpresaController::class,'store']);

//EDIT MESSAGE
Route::get('/modificar',function(){
    return view('edit.email');
});

require __DIR__.'/web/automatizacion.php';
require __DIR__.'/web/climaLaboral.php';
require __DIR__.'/web/desempeñoLaboral.php';