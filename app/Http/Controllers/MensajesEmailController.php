<?php

namespace App\Http\Controllers;

use App\Models\MensajesEmail;
use Illuminate\Http\Request;

class MensajesEmailController extends Controller
{
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
     * @param  \App\Models\MensajesEmail  $mensajesEmail
     * @return \Illuminate\Http\Response
     */
    public function show(MensajesEmail $mensajesEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MensajesEmail  $mensajesEmail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensajes = MensajesEmail::where('empresa_id',$id)->first();
        return view('usuarios.mensajes',compact('mensajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MensajesEmail  $mensajesEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $mensajes = MensajesEmail::where('empresa_id',$id)->first();
        if ($request->has('clima')) {
            $mensajes->clima = $request->clima;
        }
        if ($request->has('desempenio')) {
            $mensajes->desempenio = $request->desempenio;
        }
        if ($request->has('automatizacion')) {
            $mensajes->automatizacion = $request->automatizacion;
        }
        $mensajes->save();
        return redirect('/dashboard')->with('msj','Mensajes de Email modificados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MensajesEmail  $mensajesEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MensajesEmail $mensajesEmail)
    {
        //
    }
}
