<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;


//ENVIAR
Route::get('/enviar/automatizacion',[EmpresaController::class,'index']);
Route::get('/enviar/automatizacion/{empresa}',function(){
    return view('crear.automatizacion');
});
//Route::post('/enviar/automatizacion/{empresa}',);


//REPORTE
Route::get('/reporte/automatizacion',[EmpresaController::class,'index']);
Route::get('/reporte/automatizacion/{empresa}',function(){
    return view('reporte.elegirAutomatizacion');
});
Route::get('/reporte/automatizacion/{empresa}/{prueba}',function(){
    return view('reporte.automatizacion');
});


//ENCUESTA
Route::get('/encuesta/automatizacion/{id}',function(){
    return view('encuesta.climaLaboral');
});
