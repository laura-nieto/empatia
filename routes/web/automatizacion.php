<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomatizacionPruebasController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\IdLinkController;


//ENVIAR
Route::get('/enviar/automatizacion',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/enviar/automatizacion/{empresa}',[CategoriaController::class,'index'])->middleware('auth');
Route::post('/enviar/automatizacion/{empresa}',[IdLinkController::class,'createAutomatizacion'])->middleware('auth');


//REPORTE
Route::get('/reporte/automatizacion',[EmpresaController::class,'index']);
Route::get('/reporte/automatizacion/{empresa}',[AutomatizacionPruebasController::class,'index'])->middleware('auth');
Route::get('/reporte/automatizacion/{empresa}/{idPersona}',[DatosController::class,'indexAutomatizacion'])->middleware('auth');
Route::get('/exportar/automatizacion/{empresa}/{idPersona}',[AutomatizacionPruebasController::class,'export'])->middleware('auth');


//ENCUESTA
Route::get('/encuesta/automatizacion-de-pruebas/{id}/{datos}',[AutomatizacionPruebasController::class,'welcome'])->name('welcome');
Route::post('/encuesta/automatizacion-de-pruebas/{id}/{datos}',[AutomatizacionPruebasController::class,'siguienteCategoria']);
Route::get('/encuesta/automatizacion-de-pruebas/{id}/{datos}/{categoria}/inicio',[AutomatizacionPruebasController::class,'categoria'])->name('siguiente_categoria');
Route::post('/encuesta/automatizacion-de-pruebas/{id}/{datos}/{categoria}/inicio',[AutomatizacionPruebasController::class,'redireccionar']);

Route::get('/encuesta/automatizacion-de-pruebas/{id}/{datos}/{categoria}/preguntas',[AutomatizacionPruebasController::class,'responderCategoria'])->name('responder_categoria');
Route::post('/encuesta/automatizacion-de-pruebas/{id}/{datos}/{categoria}/preguntas',[AutomatizacionPruebasController::class,'store']);