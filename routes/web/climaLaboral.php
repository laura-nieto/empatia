<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClimaLaboralController;
use App\Http\Controllers\IdLinkController;
use App\Http\Controllers\DatosController;


// ENVIAR
Route::get('/enviar/clima-laboral',[EmpresaController::class,'index']);
Route::get('/enviar/clima-laboral/{name}',function(){
    return view('crear.climaLaboral');
})->middleware('auth');
Route::post('/enviar/clima-laboral/{name}',[IdLinkController::class,'createClima'])->middleware('auth');


//REPORTE
Route::get('/reporte/clima-laboral',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/reporte/clima-laboral/{name}',[DatosController::class,'indexClima'])->middleware('auth');
Route::get('/exportar/clima-laboral/{empresa}',[ClimaLaboralController::class,'export'])->middleware('auth');


//ENCUESTA
Route::get('/encuesta/clima-laboral/{id}',function(){
    return view('encuesta.welcomeClima');
});
Route::post('/encuesta/clima-laboral/{id}',[DatosController::class,'index']);

Route::get('/encuesta/clima-laboral/{id}/datos',[IdLinkController::class,'index'])->name('datosClima');
Route::post('/encuesta/clima-laboral/{id}/datos',[DatosController::class,'storeClima']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=1',[ClimaLaboralController::class,'page1'])->name('clima_pag1');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=1',[ClimaLaboralController::class,'store']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=2',[ClimaLaboralController::class,'page2'])->name('clima_pag2');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=2',[ClimaLaboralController::class,'store']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=3',[ClimaLaboralController::class,'page3'])->name('clima_pag3');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=3',[ClimaLaboralController::class,'store']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=4',[ClimaLaboralController::class,'page4'])->name('clima_pag4');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=4',[ClimaLaboralController::class,'store']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=5',[ClimaLaboralController::class,'page5'])->name('clima_pag5');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=5',[ClimaLaboralController::class,'store']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=6',[ClimaLaboralController::class,'page6'])->name('clima_pag6');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=6',[ClimaLaboralController::class,'store']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/page=7',[ClimaLaboralController::class,'page7'])->name('clima_pag7');
Route::post('/encuesta/clima-laboral/{id}/{datos}/page=7',[ClimaLaboralController::class,'store']);