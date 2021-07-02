<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesempenioLaboralController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\IdLinkController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\MensajeController;

//ENVIAR
Route::get('/enviar/desempenio-laboral',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/enviar/desempenio-laboral/{empresa}',function(){
    return view('crear.desempeñoLaboral');
})->middleware('auth');
Route::post('/enviar/desempenio-laboral/{empresa}',[IdLinkController::class,'createDesempeño'])->middleware('auth');


//REPORTE
Route::get('/reporte/desempenio-laboral',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/reporte/desempenio-laboral/{empresa}',[DatosController::class,'indexDesempenio'])->middleware('auth');
Route::get('/exportar/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'export'])->middleware('auth');


//ENCUESTA
Route::get('/encuesta/desempenio-laboral/{id}/{datos}',[DesempenioLaboralController::class,'index']);
Route::post('/encuesta/desempenio-laboral/{id}/{datos}',function($id,$idDatos){
    return redirect()->route('instrucciones',['id'=>$id,'datos'=>$idDatos]);
});

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/instrucciones',[MensajeController::class,'mensaje_desempeño'])->name('instrucciones');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/instrucciones',function($id,$idDatos){
    return redirect()->route('title_auto',['id'=>$id,'datos'=>$idDatos]);
});

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=1/autoevaluacion',[DesempenioLaboralController::class,'get_title'])->name('title_auto');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=1/autoevaluacion',[DesempenioLaboralController::class,'view_encuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=2/autoevaluacion',[DesempenioLaboralController::class,'encuesta'])->name('auto_page2');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=2/autoevaluacion',[DesempenioLaboralController::class,'store']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=3/autoevaluacion',[DesempenioLaboralController::class,'encuesta2'])->name('auto_page3');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=3/autoevaluacion',[DesempenioLaboralController::class,'store']);

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=1/supervisor',[DesempenioLaboralController::class,'get_title'])->name('title_supervisor');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=1/supervisor',[DesempenioLaboralController::class,'view_encuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=2/supervisor',[DesempenioLaboralController::class,'encuesta'])->name('supervisor_page2');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=2/supervisor',[DesempenioLaboralController::class,'store']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=3/supervisor',[DesempenioLaboralController::class,'encuesta2'])->name('supervisor_page3');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=3/supervisor',[DesempenioLaboralController::class,'store']);

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=1/subalterno',[DesempenioLaboralController::class,'get_title'])->name('title_subalterno');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=1/subalterno',[DesempenioLaboralController::class,'view_encuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=2/subalterno',[DesempenioLaboralController::class,'encuesta'])->name('subalterno_page2');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=2/subalterno',[DesempenioLaboralController::class,'store']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=3/subalterno',[DesempenioLaboralController::class,'encuesta2'])->name('subalterno_page3');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=3/subalterno',[DesempenioLaboralController::class,'store']);

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=1/companiero',[DesempenioLaboralController::class,'get_title'])->name('title_compañero');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=1/companiero',[DesempenioLaboralController::class,'view_encuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=2/companiero',[DesempenioLaboralController::class,'encuesta'])->name('compañero_page2');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=2/companiero',[DesempenioLaboralController::class,'store']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/page=3/companiero',[DesempenioLaboralController::class,'encuesta2'])->name('compañero_page3');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/page=3/companiero',[DesempenioLaboralController::class,'store']);

Route::get('/encuesta/desempenio-laboral/{id}/{datos}/fin',function(){
    return view('encuesta.finEncuesta');
})->name('finEncuesta');
Route::post('/encuesta/desempenio-laboral/{id}/{datos}/fin',[DesempenioLaboralController::class,'finEncuesta']);
Route::get('/encuesta/desempenio-laboral/{id}/{datos}/finalizar',function(){
    return view('encuesta.fin');
})->name('finalizar');