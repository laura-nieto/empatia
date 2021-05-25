<?php

namespace App\Http\Controllers;

use App\Models\idLink;
use Illuminate\Http\Request;

use Mail;
use App\Mail\EnviarMailable;


class IdLinkController extends Controller
{

    public function createClima(Request $request,$id){

        $link = new idLink;

        $pass = [];
        $show = $request->except(['who_send','_token','email']);
        foreach($show as $key => $value){
            array_push($pass,$key);
        }
        
        $link->preguntar_datos = json_encode($pass);
        $link->empresa_id = $id;
        $link->save();

        $sendLink = $request->gethost() . '/encuesta/clima-laboral/' . $link->id;
        //$sendLink = $request->gethost() . '/encuesta/clima-laboral/' . 'hola';

        $correo = new EnviarMailable($sendLink);
        $subject = 'Entregar link';
        foreach($request->email as $email){
            Mail::to($email)->send($correo);
        }
        return redirect('/')->with('create.encuesta','Encuesta enviada con exito');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idLink = idLink::findOrFail($id);
        $datos = json_decode($idLink->preguntar_datos);
        $empresa = $idLink->empresa_id;

        return view('encuesta.general',['datos'=>$datos,'empresa_id'=>$empresa]);
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
     * @param  \App\Models\idLink  $idLink
     * @return \Illuminate\Http\Response
     */
    public function show(idLink $idLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\idLink  $idLink
     * @return \Illuminate\Http\Response
     */
    public function edit(idLink $idLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\idLink  $idLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, idLink $idLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\idLink  $idLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(idLink $idLink)
    {
        //
    }
}
