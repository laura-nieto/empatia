<?php

namespace App\Http\Controllers;

use App\Models\DesempenioLaboral;
use Illuminate\Http\Request;
use App\Models\Datos;
use App\Models\idLink;
use App\Models\Mensaje;
use App\Models\Empresa;
use App\Models\DatosDesempenio;

use App\Exports\DesempenioLaboralExport;
use Maatwebsite\Excel\Facades\Excel;

class DesempenioLaboralController extends Controller
{
    public function export($idEmpresa){
        return Excel::download(new DesempenioLaboralExport($idEmpresa), 'desempenioLaboral.xlsx');
    }

    public function indexDesempenio($idEmpresa){
        $preguntas = DesempenioLaboral::all();
        $empresa = Empresa::findOrFail($idEmpresa)->nombre;  
        
        $auto = DatosDesempenio::has('encuesta_desempenio')->where('empresa_id',$idEmpresa)->simplePaginate(5);
        
        return view('reporte.desempenioLaboral',['empresa'=>$idEmpresa,'empresaNombre'=>$empresa,'preguntas'=>$preguntas,'evaluaciones'=>$auto]);
    }

    public function finVista($idLink)
    {
        $link = idLink::findOrFail($idLink);
        if ($link->respondio) {
            return redirect()->route('finalizar',[$idLink]);
        }
        return view('encuesta.finEncuesta');
    }

    public function finEncuesta(Request $request,$idLink)
    {
        foreach ($request->session()->all() as $key => $evaluacion) {
            if ($key == 'autoevaluacion' || $key == 'supervisor' || $key == 'subalterno' || $key == 'companiero') {
                foreach ($evaluacion as $preguntas) {
                    if(count($preguntas['preguntas']) == 13){
                        foreach ($preguntas['preguntas'] as $pregunta => $respuesta) {
                            $guardar = DesempenioLaboral::find($pregunta);
                            $guardar->datos()->attach($preguntas['evaluado_id'],['respuesta'=>$respuesta]);
                            $datos = DatosDesempenio::findOrFail($preguntas['evaluado_id']);
                            $datos->respondio = 1;
                            $datos->save();
                        }
                    }
                }
            }
        }
        $link = idLink::findOrFail($idLink);
        $link->respondio = true;
        $link->save();
        $request->session()->flush();
        $request->session()->save();
        
        return redirect()->route('finalizar',[$idLink]);
    }
    public function encuesta2(Request $request,$id,$idDatos)
    {
        $datos = DatosDesempenio::findOrFail($idDatos);
        $nombre = $datos->evaluado;
        $puesto = $datos->puesto_evaluado;

        $preguntas = DesempenioLaboral::skip(10)->take(3)->get();

        return view('encuesta.desempenio.desempenioLibre',['preguntas'=>$preguntas,'nombre'=>$nombre,'puesto'=>$puesto]);
    }
    public function encuesta(Request $request,$id,$idDatos)
    {
        $datos = DatosDesempenio::findOrFail($idDatos);
        $nombre = $datos->evaluado;
        $puesto = $datos->puesto_evaluado;

        $preguntas = DesempenioLaboral::take(10)->get();

        return view('encuesta.desempenio.desempenioLaboral',['preguntas'=>$preguntas,'nombre'=>$nombre,'puesto'=>$puesto]);      
    }
    public function view_encuesta(Request $request,$id,$idDatos)
    {
        return redirect()->route('preguntas',['id'=>$id,'datos'=>$idDatos]);
    }

    public function get_title(Request $request,$id,$datoDesempe??o){
        $link = idLink::findOrFail($id)->empresas;
        $evaluado = DatosDesempenio::findOrFail($datoDesempe??o);
        //  $request->session()->flush();
        //  $request->session()->save();
        return view('encuesta.desempenio.titleDesempenio',['persona'=>$evaluado,'empresa'=>$link]);
    }

    public function obtenerTitle(Request $request,$idLink)
    {
        $link = idLink::findOrFail($idLink);

        foreach (json_decode($link->nombre_desempe??o) as $value) {
            $evaluado = DatosDesempenio::findOrFail($value);
            if (!$evaluado->respondio) {
                return redirect()->route('title_auto',['id'=>$idLink,'datos'=>$value]);
            }
        }
        return redirect()->route('finalizar',[$idLink]);
    }

    public function mostrarEnviar($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        return view('crear.desempenioLaboral',['nombreEmpresa'=>$empresa]);
    }

    public function verCreados($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        $evaluados = DatosDesempenio::where('empresa_id',$idEmpresa)->where('enviado',0)->get();
        return view('crear.desempenioGuardados',['evaluados'=>$evaluados,'nombreEmpresa'=>$empresa]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idLink)
    {
        $link = idLink::findOrFail($idLink);
        if ($link->respondio) {
            return redirect()->route('finalizar',$idLink);
        }
        $mensaje = Mensaje::where('tipo','desempe??o laboral')->first();
        $empresa= $link->empresas;
        $cargo = json_decode($link->nombre_desempe??o,true);
        foreach ($cargo as $idDesempe??o) {
            $pass[]=DatosDesempenio::findOrFail($idDesempe??o);
        }
        return view('encuesta.desempenio.welcomeDesempenio',['cargo'=>$pass,'mensaje'=>$mensaje->mensaje,'empresa'=>$empresa]);
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
        $datos = DatosDesempenio::findOrFail($idDatos);

        $tipo = $datos->jerarquia;
        
        if($request->session()->missing($tipo)){
            foreach($request->except('_token') as $pregunta => $respuesta){
                $array[$pregunta] = $respuesta;
            }
            $session= array(
                'evaluado_id' => $idDatos,
                'preguntas' => $array
            );
            $request->session()->push($tipo,$session);
        }else{
            foreach ($request->session()->get($tipo) as $key => $value){
                if($value['evaluado_id'] == $idDatos) {
                    foreach($request->except('_token') as $pregunta => $respuesta){
                        $value['preguntas'][$pregunta] = $respuesta;
                    }
                    $request->session()->push($tipo,$value);
                    $asd = $request->session()->get($tipo);
                    unset($asd[$key]);
                    $request->session()->put($tipo,$asd);
                    
                    
                }else{
                    foreach($request->except('_token') as $pregunta => $respuesta){
                        $array[$pregunta] = $respuesta;
                    }
                    $session= array(
                        'evaluado_id' => $idDatos,
                        'preguntas' => $array
                    );
                    $request->session()->push($tipo,$session);
                }
            }
        }
        switch (last($request->segments())) {
            case 'page=2':
                return redirect()->route('preguntas_libre',['id'=>$idLink,'datos'=>$idDatos]);            
            case 'page=3':
                $link = idLink::findOrFail($idLink);
                $array=json_decode($link->nombre_desempe??o);
                $buscar = array_search($idDatos,$array);
                
                if (count($array) <= $buscar+1) {
                    return redirect()->route('finEncuesta',[$idLink]);
                }
                
                return redirect()->route('title_auto',['id'=>$idLink,'datos'=>$array[$buscar+1]]);
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
