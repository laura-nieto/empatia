<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesempenioLaboralController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\IdLinkController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\DatosDesempenioController;
use App\Http\Controllers\MensajeController;


//ENVIAR
Route::get('/enviar/desempenio-laboral',[EmpresaController::class,'index'])->middleware(['auth','isAdmin']);
Route::get('/enviar/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'mostrarEnviar'])->middleware(['auth','empresa'])->name('desempenioEnviar');
Route::post('/enviar/desempenio-laboral/{empresa}',[IdLinkController::class,'createDesempeño'])->middleware(['auth','empresa']);
Route::get('/enviar/guardados/{empresa}',[DesempenioLaboralController::class,'verCreados'])->middleware(['auth','empresa'])->name('ver_datos_desempenio');
Route::post('/enviar/guardados/{empresa}',[IdLinkController::class,'createDesempeño'])->middleware(['auth','empresa']);

//DATOS DESEMPENIO CRUD
Route::post('/datos/desempenio/{empresa}/borrar/{id}',[DatosDesempenioController::class,'destroy'])->middleware(['auth','empresa'])->name('borrar_datos');
Route::get('/datos/desempenio/{empresa}/modificar/{id}',[DatosDesempenioController::class,'edit'])->middleware(['auth','empresa']);
Route::post('/datos/desempenio/{empresa}/modificar/{id}',[DatosDesempenioController::class,'update'])->middleware(['auth','empresa']);
Route::get('/datos/desempenio/{empresa}/agregar',[DatosDesempenioController::class,'create'])->middleware(['auth','empresa']);
Route::post('/datos/desempenio/{empresa}/agregar',[DatosDesempenioController::class,'store'])->middleware(['auth','empresa']);

Route::get('/cargar/desempenio/{id}',[DatosDesempenioController::class,'cargar_vista'])->middleware(['auth','empresa']);
Route::get('/exportar/plantilla/desempenio-laboral',[DatosDesempenioController::class,'download_plantilla'])->middleware('auth');
Route::post('/cargar/desempenio/{id}',[DatosDesempenioController::class,'import_datos'])->middleware(['auth','empresa']);

//REPORTE
Route::get('/reporte/desempenio-laboral',[EmpresaController::class,'index'])->middleware(['auth','isAdmin']);
Route::get('/reporte/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'indexDesempenio'])->middleware(['auth','empresa']);
Route::get('/exportar/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'export'])->middleware(['auth','empresa']);


//ENCUESTA
Route::get('/encuesta/desempenio-laboral/{id}',[DesempenioLaboralController::class,'index']);
Route::post('/encuesta/desempenio-laboral/{id}',function($id){
    return redirect()->route('instrucciones',['id'=>$id]);
})->name('obtener_siguiente');

Route::get('/encuesta/desempenio-laboral/{id}/instrucciones',[MensajeController::class,'mensaje_desempeño'])->name('instrucciones');
Route::post('/encuesta/desempenio-laboral/{id}/instrucciones',[DesempenioLaboralController::class,'obtenerTitle']);

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=1',[DesempenioLaboralController::class,'get_title'])->name('title_auto');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=1',[DesempenioLaboralController::class,'view_encuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=2',[DesempenioLaboralController::class,'encuesta'])->name('preguntas');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=2',[DesempenioLaboralController::class,'store']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=3',[DesempenioLaboralController::class,'encuesta2'])->name('preguntas_libre');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=3',[DesempenioLaboralController::class,'store']);

Route::get('/encuesta/desempenio-laboral/{id}/fin',[DesempenioLaboralController::class,'finVista'])->name('finEncuesta');
Route::post('/encuesta/desempenio-laboral/{id}/fin',[DesempenioLaboralController::class,'finEncuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/finalizar',function(){
    return view('encuesta.fin');
})->name('finalizar');