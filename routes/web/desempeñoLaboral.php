<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

//ENVIAR
Route::get('/enviar/desempenio-laboral',[EmpresaController::class,'index']);
Route::get('/enviar/desempenio-laboral/{empresa}',function(){
    return view('crear.desempeñoLaboral');
});
//Route::post('/enviar/desempeño-laboral/{empresa}',);


//REPORTE
Route::get('/reporte/desempenio-laboral',[EmpresaController::class,'index']);
Route::get('/reporte/desempenio-laboral/{empresa}',function(){
    return view('reporte.desempeñoLaboral');
});


//ENCUESTA
Route::get('/encuesta/desempenio-laboral/{id}',function(){
    return view('encuesta.desempeñoLaboral');
});
Route::post('/encuesta/desempeño-laboral/{id}/datos',function($id){
    return view('encuesta.general');
});