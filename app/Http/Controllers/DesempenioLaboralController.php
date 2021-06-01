<?php

namespace App\Http\Controllers;

use App\Models\DesempenioLaboral;
use Illuminate\Http\Request;
use App\Models\Datos;
use App\Models\idLink;

use App\Exports\DesempenioLaboralExport;
use Maatwebsite\Excel\Facades\Excel;

class DesempenioLaboralController extends Controller
{
    public function export($idEmpresa){
        return Excel::download(new DesempenioLaboralExport($idEmpresa), 'desempenioLaboral.xlsx');
    }

    public function encuesta2(Request $request,$id,$idDatos)
    {
        $datos = Datos::findOrFail($idDatos);
        $link = idLink::findOrFail($id);
        $cargo = json_decode($link->nombre_desempeño,true);
        
        $preguntas = DesempenioLaboral::skip(10)->take(3)->get();

        foreach ($cargo as $key => $value) {
            if ($key == 'supervisor') {
                $supervisor = $value;
            }elseif ($key == 'subalterno') {
                $subalterno = $value;
            }elseif ($key == 'companiero') {
                $compañero = $value;
            }
        }
        switch (last($request->segments())){
            case 'autoevaluacion':
                return view('encuesta.desempeño.desempeñoLibre',['preguntas'=>$preguntas,'nombre'=>$datos->nombre]);         
            case 'supervisor':
                return view('encuesta.desempeño.desempeñoLibre',['preguntas'=>$preguntas,'nombre'=>$supervisor]);                  
            case 'subalterno':
                return view('encuesta.desempeño.desempeñoLibre',['preguntas'=>$preguntas,'nombre'=>$subalterno]);                  
            case 'companiero':
                return view('encuesta.desempeño.desempeñoLibre',['preguntas'=>$preguntas,'nombre'=>$compañero]);         
        }
    }
    public function encuesta(Request $request,$id,$idDatos)
    {
        $datos = Datos::findOrFail($idDatos);
        $link = idLink::findOrFail($id);
        $cargo = json_decode($link->nombre_desempeño,true);
        
        $preguntas = DesempenioLaboral::take(10)->get();

        foreach ($cargo as $key => $value) {
            if ($key == 'supervisor') {
                $supervisor = $value;
            }elseif ($key == 'subalterno') {
                $subalterno = $value;
            }elseif ($key == 'companiero') {
                $compañero = $value;
            }
        }
        switch (last($request->segments())){
            case 'autoevaluacion':
                return view('encuesta.desempeño.desempeñoLaboral',['preguntas'=>$preguntas,'nombre'=>$datos->nombre]);         
            case 'supervisor':
                return view('encuesta.desempeño.desempeñoLaboral',['preguntas'=>$preguntas,'nombre'=>$supervisor]);                  
            case 'subalterno':
                return view('encuesta.desempeño.desempeñoLaboral',['preguntas'=>$preguntas,'nombre'=>$subalterno]);                  
            case 'companiero':
                return view('encuesta.desempeño.desempeñoLaboral',['preguntas'=>$preguntas,'nombre'=>$compañero]);         
        }
    }
    public function view_encuesta(Request $request,$id,$idDatos)
    {
        switch (last($request->segments())){
            case 'autoevaluacion':
                return redirect()->route('auto_page2',['id'=>$id,'datos'=>$idDatos]);         
            case 'supervisor':
                return redirect()->route('supervisor_page2',['id'=>$id,'datos'=>$idDatos]);         
            case 'subalterno':
                return redirect()->route('subalterno_page2',['id'=>$id,'datos'=>$idDatos]);         
            case 'companiero':
                return redirect()->route('compañero_page2',['id'=>$id,'datos'=>$idDatos]);
        }
    }

    public function get_title(Request $request,$id,$idDatos){
        $datos = Datos::findOrFail($idDatos);
        $link = idLink::findOrFail($id);
        $cargo = json_decode($link->nombre_desempeño,true);
        foreach ($cargo as $key => $value) {
            if ($key == 'supervisor') {
                $supervisor = $value;
            }elseif ($key == 'subalterno') {
                $subalterno = $value;
            }elseif ($key == 'companiero') {
                $compañero = $value;
            }
        }
        switch (last($request->segments())){
            case 'autoevaluacion':
                return view('encuesta.desempeño.titleDesempeño',['nombre'=>$datos->nombre]);         
            case 'supervisor':
                return view('encuesta.desempeño.titleDesempeño',['nombre'=>$supervisor]);         
            case 'subalterno':
                return view('encuesta.desempeño.titleDesempeño',['nombre'=>$subalterno]);         
            case 'companiero':
                return view('encuesta.desempeño.titleDesempeño',['nombre'=>$compañero]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idLink,$idDatos)
    {
        $link = idLink::findOrFail($idLink);
        $cargo = json_decode($link->nombre_desempeño,true);
        return view('encuesta.desempeño.welcomeDesempeño',['cargos'=>$cargo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idLink,$idDatos)
    {
        $url = $request->segment(5).'/'.$request->segment(6);

        $link = idLink::findOrFail($idLink);
        $cargos = json_decode($link->nombre_desempeño,true);
        foreach($cargos as $cargo => $datos){
            if($cargo == last($request->segments())){
                $evaluador = json_encode([$datos[0],$datos[1]]);
                $tipo = $cargo;
            }
        }
        foreach($request->except('_token') as $pregunta => $respuesta){
            $guardar = DesempenioLaboral::find($pregunta);

            $guardar->datos()->attach($idDatos,['respuesta'=>$respuesta,'tipo'=>$tipo,'evaluado'=>$evaluador]);
        }
        switch ($url) {
            case 'page=2/autoevaluacion':
                return redirect()->route('auto_page3',['id'=>$idLink,'datos'=>$idDatos]);            
            case 'page=3/autoevaluacion':
                return redirect()->route('title_supervisor',['id'=>$idLink,'datos'=>$idDatos]);
            case 'page=2/supervisor':
                return redirect()->route('supervisor_page3',['id'=>$idLink,'datos'=>$idDatos]);            
            case 'page=3/supervisor':
                return redirect()->route('title_subalterno',['id'=>$idLink,'datos'=>$idDatos]);
            case 'page=2/subalterno':
                return redirect()->route('subalterno_page3',['id'=>$idLink,'datos'=>$idDatos]);            
            case 'page=3/subalterno':
                return redirect()->route('title_compañero',['id'=>$idLink,'datos'=>$idDatos]);
            case 'page=2/companiero':
                return redirect()->route('compañero_page3',['id'=>$idLink,'datos'=>$idDatos]);            
            case 'page=3/companiero':
                return view('encuesta.fin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DesempenioLaboral  $desempenioLaboral
     * @return \Illuminate\Http\Response
     */
    public function show(DesempenioLaboral $desempenioLaboral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesempenioLaboral  $desempenioLaboral
     * @return \Illuminate\Http\Response
     */
    public function edit(DesempenioLaboral $desempenioLaboral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesempenioLaboral  $desempenioLaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DesempenioLaboral $desempenioLaboral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesempenioLaboral  $desempenioLaboral
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesempenioLaboral $desempenioLaboral)
    {
        //
    }
}
