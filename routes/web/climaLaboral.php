<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClimaLaboralController;
use App\Http\Controllers\IdLinkController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\DatosDemograficosController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\EmailController;


// ENVIAR
Route::get('/enviar/clima-laboral',[EmpresaController::class,'index'])->middleware(['auth','isAdmin']);
Route::get('/enviar/clima-laboral/{name}',[DatosDemograficosController::class,'index'])->name('enviarClima')->middleware(['auth','empresa']);
Route::post('/enviar/clima-laboral/{name}',[IdLinkController::class,'createClima'])->middleware(['auth','empresa']);

Route::get('/importar/clima-laboral/{name}',[EmpresaController::class,'vistaCargarMail'])->middleware(['auth','empresa']);
Route::post('/importar/clima-laboral/{name}',[ClimaLaboralController::class,'importMail'])->middleware(['auth','empresa']);

// Route::get('/importar/clima-laboral/datos/{name}',[EmpresaController::class,'vistaCargarDatos'])->middleware('auth');
// Route::post('/importar/clima-laboral/datos/{name}',[IdLinkController::class,'importDatos'])->middleware('auth');
// Route::get('/exportar/plantilla/clima-laboral',[ClimaLaboralController::class,'exportPlantilla'])->middleware('auth');
Route::get('/exportar/plantilla/emails',[ClimaLaboralController::class,'exportPlantillaEmail'])->middleware('auth');

Route::get('/borrar/email/{idEmpresa}/{idEmail}',[EmailController::class,'destroy'])->middleware(['auth','empresa']);

//REPORTE
Route::get('/reporte/clima-laboral',[EmpresaController::class,'index'])->middleware(['auth','isAdmin']);
Route::get('/reporte/clima-laboral/{name}',[DatosController::class,'indexClima'])->middleware(['auth','empresa']);
Route::get('/exportar/clima-laboral/{empresa}',[ClimaLaboralController::class,'export'])->middleware(['auth','empresa']);


//ENCUESTA
Route::get('/encuesta/clima-laboral/{id}/{datosID}',[MensajeController::class,'mensaje_clima']);
Route::post('/encuesta/clima-laboral/{id}/{datosID}',[DatosController::class,'index']);

Route::get('/encuesta/clima-laboral/{id}/{datosID}/datos',[IdLinkController::class,'index'])->name('datosClima');
Route::post('/encuesta/clima-laboral/{id}/{datosID}/datos',[DatosController::class,'storeClima']);

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

Route::get('/encuesta/clima-laboral/{id}/{datos}/fin',[ClimaLaboralController::class,'finVista'])->name('finEncuestaClima');
Route::post('/encuesta/clima-laboral/{id}/{datos}/fin',[ClimaLaboralController::class,'finEncuesta']);

Route::get('/encuesta/clima-laboral/{id}/{datos}/finalizar',function(){
    return view('encuesta.fin');
})->name('finalizarClima');