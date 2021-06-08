<?php

namespace App\Http\Controllers;

use App\Models\DatosDemograficos;
use Illuminate\Http\Request;

class DatosDemograficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosDemo = DatosDemograficos::all();
        return view('crear.climaLaboral',['datosDemo'=>$datosDemo]);
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
        //
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
    public function destroy(DatosDemograficos $datosDemograficos)
    {
        //
    }
}
