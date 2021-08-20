<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Models\Datos;
use App\Models\idLink;

class MensajeController extends Controller
{
    public function modificar_instrucciones(Request $request)
    {
        $mensaje = Mensaje::where('tipo','desempeño laboral')->get();
        foreach ($mensaje as $key => $value) {
            if ($key === 1) {
                $value->mensaje = $request->editar1;
                $value->save();
            }elseif ($key === 2) {
                $value->mensaje = $request->editar2;
                $value->save();
            }
        }
        return redirect('/')->with('update.mensaje','Mensaje actualizado correctamente');
    }

    public function mostrar_modificar_instrucciones()
    {
        $mensaje = Mensaje::where('tipo','desempeño laboral')->get();
        foreach ($mensaje as $key => $value) {
            if ($key === 1) {
                $instruccion1 = $value->mensaje;
            }elseif ($key === 2) {
                $instruccion2 = $value->mensaje;
            }
        }
        return view('edit.editInstrucciones',['instruccion1'=>$instruccion1,'instruccion2'=>$instruccion2]);
    }

    public function mensaje_desempeño($idLink)
    {
        $empresa = idLink::findOrFail($idLink)->empresas;
        $mensaje = Mensaje::where('tipo','desempeño laboral')->get();
        foreach ($mensaje as $key => $value) {
            if($key === 1){
                $instruccion1 = $value->mensaje;
            }elseif ($key === 2) {
                $instruccion2 = $value->mensaje;
            }
        }
        return view('encuesta.desempeño.instruccionesDesempeño',['instruccion1'=>$instruccion1,'instruccion2'=>$instruccion2,'empresa'=>$empresa]);
    }
    public function mensaje_clima($id,$idDatos)
    {
        $empresa = Datos::findOrFail($idDatos)->empresas;
        $dato =Datos::findOrFail($idDatos);
        if (!$dato->links->isEmpty()) {
            return redirect()->route('finalizarClima',[$id,$idDatos]);
        }
        $mensaje = Mensaje::where('tipo','clima laboral')->first();
        return view('encuesta.welcomeClima',['mensaje'=>$mensaje->mensaje,'empresa'=>$empresa]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newMensaje = new Mensaje;
        
        if (last($request->segments()) == 'clima-laboral') {
            $newMensaje->tipo = 'clima laboral';
        } elseif(last($request->segments()) == 'desempenio-laboral'){
            $newMensaje->tipo = 'desempeño laboral';
        } elseif (last($request->segments()) == 'automatizacion-laboral') {
            $newMensaje->tipo = 'automatizacion';
        }
        $newMensaje->mensaje = $request->editar;
        $newMensaje->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $mensaje, Request $request)
    {
        if (last($request->segments()) == 'clima-laboral') {
            $mensaje = Mensaje::where('tipo','clima laboral')->first();
            $titulo = 'clima laboral';
        } elseif(last($request->segments()) == 'desempenio-laboral'){
            $mensaje = Mensaje::where('tipo','desempeño laboral')->first();
            $titulo = 'desempeño laboral';
        }elseif(last($request->segments()) == 'automatizacion-laboral'){
            $mensaje = Mensaje::where('tipo','automatizacion')->first();
            $titulo = 'automatizacion laboral';
        }
        return view('edit.edit',['mensaje'=>$mensaje->mensaje,'titulo'=>$titulo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        if (last($request->segments()) == 'clima-laboral') {
            $mensaje = Mensaje::where('tipo','clima laboral')->first();
            $mensaje->mensaje = $request->editar;
            $mensaje->save();

        } elseif(last($request->segments()) == 'desempenio-laboral'){
            $mensaje = Mensaje::where('tipo','desempeño laboral')->first();
            $mensaje->mensaje = $request->editar;
            $mensaje->save();
        } elseif(last($request->segments()) == 'automatizacion-laboral'){
            $mensaje = Mensaje::where('tipo','automatizacion')->first();
            $mensaje->mensaje = $request->editar;
            $mensaje->save();
        }
        return redirect('/')->with('update.mensaje','Mensaje actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
