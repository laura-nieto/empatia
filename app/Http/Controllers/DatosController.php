<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use App\Models\DesempenioLaboral;
use App\Models\ClimaLaboral;
use App\Models\Empresa;


class DatosController extends Controller
{
    public function indexAutomatizacion($idEmpresa, $idPersona)
    {
        $persona = Datos::findOrFail($idPersona)->load(['datos_categorias']);
        return view('reporte.automatizacion',['persona'=>$persona]);
    }

    public function indexDesempenio($idEmpresa){
        $preguntas = DesempenioLaboral::all();
        $empresa = Empresa::findOrFail($idEmpresa)->nombre;  
        
        $auto = Datos::has('encuesta_desempenio')->where('empresa_id',$idEmpresa)->simplePaginate(5);
       
        return view('reporte.desempeñoLaboral',['empresa'=>$idEmpresa,'empresaNombre'=>$empresa,'preguntas'=>$preguntas,'evaluaciones'=>$auto]);
    }

    public function storeClima(Request $request,$id,$idDatos)
    {
        $pass = $request->except(['_token','empresa_id','nombre','mail']);
        // // VALIDACION
        // $rules = [
        //     'nombre' => 'required',
        //     'mail' => 'required|email',
        // ];
        // $message = [
        //     'required'=>'El campo es obligatorio',
        //     'email'=>'Debe ingresarse una dirección de correo correcta',
        // ];
        // $request->validate($rules,$message);
        $findPerson = Datos::findOrFail($idDatos);
        if (!$findPerson->importado) {
            // GUARDAR SESION
            $datos_demograficos = [];
            foreach($pass as $key => $dato){
                $save[$key] = $dato;
            }
            $session = [
                'datos_demograficos' => $save,
                'preguntas'=>[]
            ];
            $request->session()->put('encuesta',$session);
        }
        
        return redirect()->route('clima_pag1',['id'=>$id,'datos'=>$idDatos]);
    }
    
    public function indexClima($id)
    {
        $datos = Datos::has('encuesta_clima')->where('empresa_id',$id)->select('id','nombre','mail','observacion','datos_demograficos','empresa_id')->simplePaginate(10);
        $array_datos = [];

        $viewDatos = json_decode($datos[0]->datos_demograficos,true);
        foreach($viewDatos as $viewDato => $key){
            $viewDato = str_replace('_',' ',$viewDato);
            $array_datos[] = $viewDato;
        }
        
        $preguntas = ClimaLaboral::all();
        $empresa = Empresa::findOrFail($id)->nombre;

        return view('reporte.climaLaboral',['preguntas'=>$preguntas,'datos'=>$datos,'empresaNombre'=>$empresa,'empresa'=>$id,'array_datos'=>$array_datos]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id,$idDatos)
    {
        if($request->has('false')){
            return view('encuesta.laterClima');
        } elseif($request->has('true')){
            return redirect()->route('datosClima',['id'=>$id,'datosID'=>$idDatos]);
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
