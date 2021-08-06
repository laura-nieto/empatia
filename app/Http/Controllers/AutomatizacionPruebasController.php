<?php

namespace App\Http\Controllers;

use App\Models\AutomatizacionPruebas;
use Illuminate\Http\Request;
use App\Models\Datos;
use App\Models\Mensaje;

use App\Exports\AutomatizacionExport;
use Maatwebsite\Excel\Facades\Excel;

class AutomatizacionPruebasController extends Controller
{
    public function export($idEmpresa,$idPersona){
        $dato = Datos::findOrFail($idPersona);
        $empresa = $dato->empresas->nombre;
        $categories = $dato->datos_categorias;
        return Excel::download(new AutomatizacionExport($idPersona,$categories), $dato->nombre . ' - ' . $empresa . '.xlsx');
    }

    public function responderCategoria($idLink,$idDatos,$idCategoria)
    {
        $dato = Datos::findOrFail($idDatos);
        foreach($dato->datos_categorias as $categoria){
            if($categoria->id == $idCategoria){
                if ($categoria->pivot->respondio != 0) {
                    return redirect()->route('welcome',['id'=>$idLink,'datos'=>$idDatos]);
                }else{
                    $tiempo = $categoria->pivot->tiempo;
                }
            }
        }
        $preguntas = AutomatizacionPruebas::where('category_id',$idCategoria)->get();
        
        return view('encuesta.automatizacion.preguntas',['preguntas'=>$preguntas,'tiempo'=>$tiempo,'idCategoria'=>$idCategoria]);
    }
    public function redireccionar($idLink,$idDatos,$idCategoria)
    {
        return redirect()->route('responder_categoria',['id'=>$idLink,'datos'=>$idDatos,'categoria'=>$idCategoria]);
    }
    public function categoria($idLink,$idDatos,$idCategoria)
    {
        $datos = Datos::findOrFail($idDatos);
        $empresa = $datos->empresas;
        return view('encuesta.automatizacion.categoria',['datos'=>$datos,'idCategoria'=>$idCategoria,'empresa'=>$empresa]);
    }
    public function siguienteCategoria($idLink,$idDatos)
    {
        $datos = Datos::findOrFail($idDatos);
        foreach($datos->datos_categorias as $categoria){
            if(!$categoria->pivot->respondio){
                return redirect()->route('siguiente_categoria',['id'=>$idLink,'datos'=>$idDatos,'categoria'=>$categoria->id]);
            }
        }
        return view('encuesta.automatizacion.terminado');
    }
    public function welcome($idLink,$idDatos)
    {
        $datos = Datos::findOrFail($idDatos);
        $mensaje = Mensaje::where('tipo','automatizacion')->first();
        $empresa = $datos->empresas;
        return view('encuesta.automatizacion.welcome',['datos'=>$datos,'mensaje'=>$mensaje->mensaje,'empresa'=>$empresa]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idEmpresa)
    {
        $datos = Datos::has('encuesta_automatizacion')->where('empresa_id',$idEmpresa)->get()->sortBy('nombre');
        return view('reporte.elegirAutomatizacion',['datos'=>$datos]);
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
    public function store(Request $request,$idLink,$idDatos,$idCategoria)
    {
        $dato = Datos::findOrFail($idDatos);
        $request = $request->except(['_token','tiempo']);
        if ($idCategoria == 8 || $idCategoria == 5) {
            foreach ($request as $pregunta =>$rta) {
                $guardar = AutomatizacionPruebas::find($pregunta);
                $guardar->datos()->attach($idDatos,['respuesta'=>json_encode($rta)]);
            }
        }elseif($idCategoria == 3){
            $i=1;
            foreach ($request as $pregunta => $rta) {
                $guardar = AutomatizacionPruebas::find($pregunta);
                if ($i%5 === 0) {
                    $guardar->datos()->attach($idDatos,['respuesta'=>json_encode($rta)]);   
                }else{
                    $guardar->datos()->attach($idDatos,['respuesta'=>$rta]);
                }
            $i+=1;
            }
        }else{
            foreach ($request as $pregunta => $respuesta) {
                $guardar = AutomatizacionPruebas::find($pregunta);
                $guardar->datos()->attach($idDatos,['respuesta'=>$respuesta]);
            }
        }
        $dato->datos_categorias()->updateExistingPivot($idCategoria,['respondio' => 1]);
        return redirect()->route('welcome',['id'=>$idLink,'datos'=>$idDatos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutomatizacionPruebas  $automatizacionPruebas
     * @return \Illuminate\Http\Response
     */
    public function show(AutomatizacionPruebas $automatizacionPruebas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutomatizacionPruebas  $automatizacionPruebas
     * @return \Illuminate\Http\Response
     */
    public function edit(AutomatizacionPruebas $automatizacionPruebas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutomatizacionPruebas  $automatizacionPruebas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutomatizacionPruebas $automatizacionPruebas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutomatizacionPruebas  $automatizacionPruebas
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutomatizacionPruebas $automatizacionPruebas)
    {
        //
    }
}
