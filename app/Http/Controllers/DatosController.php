<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use App\Models\DesempenioLaboral;
use App\Models\ClimaLaboral;


class DatosController extends Controller
{
    public function indexDesempenio($idEmpresa){
        $preguntas = DesempenioLaboral::all();
                
        $auto = Datos::has('encuesta_desempenio')->where('empresa_id',$idEmpresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','autoevaluacion');
        }])->simplePaginate(5);

        $supervisor = Datos::has('encuesta_desempenio')->where('empresa_id',$idEmpresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','supervisor');
        }])->simplePaginate(5);

        $subalterno = Datos::has('encuesta_desempenio')->where('empresa_id',$idEmpresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','subalterno');
        }])->simplePaginate(5);

        $companiero = Datos::has('encuesta_desempenio')->where('empresa_id',$idEmpresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','companiero');
        }])->simplePaginate(5);
       
        return view('reporte.desempeñoLaboral',['empresa'=>$idEmpresa,'preguntas'=>$preguntas,'autoevaluacion'=>$auto,'supervisor'=>$supervisor,'subalterno'=>$subalterno,'companiero'=>$companiero]);
    }

    public function storeClima(Request $request,$id)
    {
        $newDatos = new Datos;

        if ($request->has('nombre')){
            $newDatos->nombre = $request->nombre;
        };
        if ($request->has('genero')){
            $newDatos->genero = $request->genero;
        };
        if ($request->has('titulo')){
            $newDatos->titulo = $request->titulo;
        };

        $newDatos->empresa_id = $request->empresa_id;
        
        $newDatos->save();
        $id_datos = $newDatos->id;

        return redirect()->route('clima_pag1',['id'=>$id,'datos'=>$id_datos]);
    }
    
    public function indexClima($id)
    {
        $datos = Datos::has('encuesta_clima')->where('empresa_id',$id)->select('id','nombre','genero','titulo','empresa_id')->simplePaginate(10);
        $preguntas = ClimaLaboral::all();
        return view('reporte.climaLaboral',['preguntas'=>$preguntas,'datos'=>$datos,'empresa'=>$id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        if($request->has('false')){
            dd('lastima');
        } elseif($request->has('true')){
            return redirect()->route('datosClima',['id'=>$id]);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function show(Datos $datos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos $datos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datos $datos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datos $datos)
    {
        //
    }
}
