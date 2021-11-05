<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\DatosDemograficosController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\MensajesEmailController;

use App\Imports\AutomatizacionImport;

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
})->middleware(['auth','isAdmin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// LOGIN - LOG-OUT
Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::post('/login',[UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logOut']);

//CRUD USUARIOS
Route::resource('usuarios',UserController::class)->middleware(['auth','isAdmin']);

//NEW EMPRESA
Route::get('/new/empresa',[EmpresaController::class,'create'])->middleware(['auth','isAdmin']);
Route::post('/new/empresa',[EmpresaController::class,'store'])->middleware(['auth','isAdmin']);
Route::get('/delete/empresa',[EmpresaController::class,'edit'])->middleware(['auth','isAdmin']);
Route::get('/delete/empresa/{id}',[EmpresaController::class,'destroy'])->middleware(['auth','isAdmin']);
Route::get('/modificar/empresa/{id}',[EmpresaController::class,'show'])->middleware(['auth','empresa']);
Route::post('/modificar/empresa/{id}',[EmpresaController::class,'update'])->middleware(['auth','empresa']);

//NEW DATO
Route::get('/new/dato',[DatosDemograficosController::class,'create'])->middleware(['auth']);
Route::post('/new/dato',[DatosDemograficosController::class,'store'])->middleware(['auth']);
Route::get('/agregar/dato',[EmpresaController::class,'index'])->middleware(['auth','isAdmin']);
Route::get('/agregar/dato/{idEmpresa}',[DatosDemograficosController::class,'opcionesEmpresa'])->middleware(['auth','empresa']);
Route::post('/agregar/dato/{idEmpresa}',[DatosDemograficosController::class,'guardarOpcionesEmpresa'])->middleware(['auth','empresa']);
Route::get('/delete/dato',[DatosDemograficosController::class,'show'])->middleware(['auth','isAdmin']);
Route::get('/delete/dato/{id}',[DatosDemograficosController::class,'destroy'])->middleware(['auth','isAdmin']);

//EDIT MESSAGE
Route::get('/modificar/clima-laboral',[MensajeController::class,'edit'])->middleware(['auth','isAdmin']);
Route::post('/modificar/clima-laboral',[MensajeController::class,'update'])->middleware(['auth','isAdmin']);

Route::get('/modificar/desempenio-laboral',[MensajeController::class,'edit'])->middleware(['auth','isAdmin']);
Route::post('/modificar/desempenio-laboral',[MensajeController::class,'update'])->middleware(['auth','isAdmin']);
Route::get('/modificar/instrucciones/desempenio-laboral',[MensajeController::class,'mostrar_modificar_instrucciones'])->middleware(['auth','isAdmin']);
Route::post('/modificar/instrucciones/desempenio-laboral',[MensajeController::class,'modificar_instrucciones'])->middleware(['auth','isAdmin']);

Route::get('/modificar/automatizacion-laboral',[MensajeController::class,'edit'])->middleware(['auth','isAdmin']);
Route::post('/modificar/automatizacion-laboral',[MensajeController::class,'update'])->middleware(['auth','isAdmin']);

//EDIT EMAILS
Route::get('/modificar/email/{id}',[MensajesEmailController::class,'edit'])->middleware(['auth','empresa']);
Route::post('/modificar/email/{id}',[MensajesEmailController::class,'update'])->middleware(['auth','empresa']);


// Route::get('/migrate/automatizacion',function(){
//     return view('migrateAutomatizacion');
// });
// Route::post('/migrate/automatizacion',function(){
//     Excel::import(new AutomatizacionImport, request()->file('importAuto'));
//     dd('ya');
// });
require __DIR__.'/web/automatizacion.php';
require __DIR__.'/web/climaLaboral.php';
require __DIR__.'/web/desempenioLaboral.php';

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });