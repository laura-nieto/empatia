<?php

namespace App\Http\Controllers;

use App\Models\DatosDemograficos;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Empresa;

class DatosDemograficosController extends Controller
{
    public function guardarOpcionesEmpresa(Request $request,$idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        $req = $request->except(['_token']);
        foreach ($req as $demografico => $options) {
            foreach ($options as $option) {
                if ($option != null) {
                    $entry[]=$option;
                }
            }
            $empresa->opcionesDemograficos()->attach($demografico,['opciones'=>json_encode($entry)]);
            $entry=[];
        }
        return redirect('/enviar/clima-laboral/'.$idEmpresa);
    }
    public function opcionesEmpresa($idEmpresa)
    {
        $datosDemo = DatosDemograficos::all()->sortBy('nombre_dato');
        $empresa = Empresa::findOrFail($idEmpresa);
        return view('agregarDatoEmpresa',['datosDemo'=>$datosDemo,'empresa'=>$empresa]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        $emails = Email::where('empresa_id',$idEmpresa)->get();
        $importados = Empresa::findOrFail($idEmpresa)->datos->where('importado',true);
        
        return view('crear.climaLaboral',['empresa'=>$empresa,'emailsGuardados'=>$emails,'importados'=>$importados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newDatoDemografico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato = new DatosDemograficos;
        $pass = [];

        $rules = ['name' => 'required'];
        $message = ['required'=>'El campo es obligatorio'];
        $validate = $request->validate($rules,$message);

        $dato->nombre_dato = $request->name;
        
        $dato->save();

        return redirect('/')->with('create.dato','Dato nuevo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosDemograficos  $datosDemograficos
     * @return \Illuminate\Http\Response
     */
    public function show(DatosDemograficos $datosDemograficos)
    {
        $datosDemograficos = $datosDemograficos->orderByDesc('created_at')->get();
        return view('eliminarDato',['datos'=>$datosDemograficos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosDemograficos  $datosDemograficos
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosDemograficos $datosDemograficos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DatosDemograficos  $datosDemograficos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosDemograficos $datosDemograficos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosDemograficos  $datosDemograficos
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosDemograficos $datosDemograficos,$id)
    {
        $datosDemograficos = $datosDemograficos->findOrFail($id)->delete();
        return redirect('/delete/dato')->with('delete.dato','El dato fue eliminado');
    }
}
