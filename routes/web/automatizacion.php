<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IdLinkController;


//ENVIAR
Route::get('/enviar/automatizacion',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/enviar/automatizacion/{empresa}',[CategoriaController::class,'index'])->middleware('auth');
Route::post('/enviar/automatizacion/{empresa}',[IdLinkController::class,'createAutomatizacion'])->middleware('auth');


//REPORTE
Route::get('/reporte/automatizacion',[EmpresaController::class,'index']);
Route::get('/reporte/automatizacion/{empresa}',function(){
    return view('reporte.elegirAutomatizacion');
})->middleware('auth');
Route::get('/reporte/automatizacion/{empresa}/{prueba}',function(){
    return view('reporte.automatizacion');
})->middleware('auth');


//ENCUESTA
Route::get('/encuesta/automatizacion/{id}',function(){
    return view('encuesta.climaLaboral');
});
