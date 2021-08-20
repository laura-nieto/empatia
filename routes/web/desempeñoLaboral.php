<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesempenioLaboralController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\IdLinkController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\DatosDesempenioController;
use App\Http\Controllers\MensajeController;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Route::get('/asd',function(){
    Schema::table('id_links', function (Blueprint $table) {
        $table->boolean('respondio')->default('0');
    });
});

//ENVIAR
Route::get('/enviar/desempenio-laboral',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/enviar/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'mostrarEnviar'])->middleware('auth')->name('desempenioEnviar');
Route::post('/enviar/desempenio-laboral/{empresa}',[IdLinkController::class,'createDesempeño'])->middleware('auth');
Route::get('/enviar/guardados/{empresa}',[DesempenioLaboralController::class,'verCreados'])->middleware('auth')->name('ver_datos_desempenio');
Route::post('/enviar/guardados/{empresa}',[IdLinkController::class,'createDesempeño'])->middleware('auth');

//DATOS DESEMPENIO CRUD
Route::post('/datos/desempenio/borrar/{empresa}/{id}',[DatosDesempenioController::class,'destroy'])->middleware('auth')->name('borrar_datos');
Route::get('/datos/desempenio/modificar/{empresa}/{id}',[DatosDesempenioController::class,'edit'])->middleware('auth');
Route::post('/datos/desempenio/modificar/{empresa}/{id}',[DatosDesempenioController::class,'update'])->middleware('auth');

//REPORTE
Route::get('/reporte/desempenio-laboral',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/reporte/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'indexDesempenio'])->middleware('auth');
Route::get('/exportar/desempenio-laboral/{empresa}',[DesempenioLaboralController::class,'export'])->middleware('auth');


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