<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

// ENVIAR
Route::get('/enviar/clima-laboral',[EmpresaController::class,'index']);
Route::get('/enviar/clima-laboral/{name}',function(){
    return view('crear.climaLaboral');
});
//Route::post('/enviar/clima-laboral/{name}',);


//REPORTE
Route::get('/reporte/clima-laboral',[EmpresaController::class,'index']);
Route::get('/reporte/clima-laboral/{name}',function(){
    return view('reporte.climaLaboral');
});


//ENCUESTA
Route::get('/encuesta/clima-laboral/{id}',function(){
    return view('encuesta.welcomeClima');
});
Route::post('/encuesta/clima-laboral/{id}',function($id){
    return redirect()->route('ingresarDatos');
});

Route::get('/encuesta/clima-laboral/{id}/datos',function(){
    return view('encuesta.general');
})->name('ingresarDatos');
Route::post('/encuesta/clima-laboral/{id}/datos',function($id){
    return view('encuesta.general');
});
Route::get('/encuesta/clima-laboral/{id}/page=1',function($id){
    return view('encuesta.climaLaboral');
});