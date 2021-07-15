<?php

namespace App\Http\Controllers;

use App\Models\DesempenioLaboral;
use Illuminate\Http\Request;
use App\Models\Datos;
use App\Models\idLink;
use App\Models\Mensaje;

use App\Exports\DesempenioLaboralExport;
use Maatwebsite\Excel\Facades\Excel;

class DesempenioLaboralController extends Controller
{
    public function export($idEmpresa){
        return Excel::download(new DesempenioLaboralExport($idEmpresa), 'desempenioLaboral.xlsx');
    }
    public function finEncuesta(Request $request,$idLink,$idDatos)
    {
        foreach ($request->session()->all() as $tipo => $datos) {
            if ($tipo == 'autoevaluacion' || $tipo == 'supervisor' || $tipo == 'subalterno' || $tipo == 'companiero') {
                $evaluado = json_encode([$datos['nombre'],$datos['cargo']]);
                foreach ($datos['preguntas'] as $pregunta => $respuesta) {
                    $guardar = DesempenioLaboral::find($pregunta);
                    $guardar->datos()->attach($idDatos,['respuesta'=>$respuesta,'tipo'=>$tipo,'evaluado'=>$evaluado]);
                }
            }
        }
        $request->session()->flush();
        $request->session()->save();
        return redirect()->route('finalizar',['id'=>$idLink,'datos'=>$idDatos]);
    }
    public function encuesta2(Request $request,$id,$idDatos)
    {
        $datos = Datos::findOrFail($idDatos);
        $link = idLink::findOrFail($id);
        $cargo = json_decode($link->nombre_desempeño,true);
        foreach ($cargo as $cargoName => $datos){
            $nombre = $datos[0];
        }

        $preguntas = DesempenioLaboral::skip(10)->take(3)->get();

        return view('encuesta.desempeño.desempeñoLibre',['preguntas'=>$preguntas,'nombre'=>$nombre]);
    }
    public function encuesta(Request $request,$id,$idDatos)
    {
        $datos = Datos::findOrFail($idDatos);
        $link = idLink::findOrFail($id);
        $cargo = json_decode($link->nombre_desempeño,true);
        foreach ($cargo as $cargoName => $datos){
            $nombre = $datos[0];
        }

        $preguntas = DesempenioLaboral::take(10)->get();

        return view('encuesta.desempeño.desempeñoLaboral',['preguntas'=>$preguntas,'nombre'=>$nombre]);      
    }
    public function view_encuesta(Request $request,$id,$idDatos)
    {
        return redirect()->route('preguntas',['id'=>$id,'datos'=>$idDatos]);
    }
    public function get_title(Request $request,$id,$idDatos){       
        $datos = Datos::findOrFail($idDatos);
        $link = idLink::findOrFail($id);
        $cargo = json_decode($link->nombre_desempeño,true);

        return view('encuesta.desempeño.titleDesempeño',['persona'=>$cargo]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idLink,$idDatos)
    {
        $link = idLink::findOrFail($idLink);
        $mensaje = Mensaje::where('tipo','desempeño laboral')->first();
        $cargo = json_decode($link->nombre_desempeño,true);
        return view('encuesta.desempeño.welcomeDesempeño',['cargo'=>$cargo,'mensaje'=>$mensaje->mensaje]);
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

        $link = idLink::findOrFail($idLink);
        $cargos = json_decode($link->nombre_desempeño,true);
        
        foreach($cargos as $cargo => $datos){
            $tipo = $cargo;
            $evaluado = $datos[0];
            $puesto = $datos[1];
        }
        if($request->session()->missing($tipo)){
            foreach($request->except('_token') as $pregunta => $respuesta){
                $array[$pregunta] = $respuesta;
            }
            $session= array(
                'nombre' => $evaluado,
                'cargo' =>$puesto,
                'preguntas' => $array
            );
            $request->session()->put($tipo,$session);
        }else{
            $session = $request->session()->get($tipo);
            foreach($request->except('_token') as $pregunta => $respuesta){
                $session['preguntas'][$pregunta] = $respuesta;
            }
            $request->session()->put($tipo,$session);
        }

        switch (last($request->segments())) {
            case 'page=2':
                return redirect()->route('preguntas_libre',['id'=>$idLink,'datos'=>$idDatos]);            
            case 'page=3':
                return redirect()->route('finEncuesta',['id'=>$idLink,'datos'=>$idDatos]);
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
