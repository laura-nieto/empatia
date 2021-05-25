<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;

class DatosController extends Controller
{
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
        $datos = Datos::with('encuesta_clima')->where('empresa_id',$id)->select('id','nombre','genero','titulo','empresa_id')->get();
        return view('reporte.climaLaboral',['datos'=>$datos]);
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
