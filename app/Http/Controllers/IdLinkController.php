<?php

namespace App\Http\Controllers;

use App\Models\idLink;
use Illuminate\Http\Request;

use Mail;
use App\Mail\EnviarMailable;
use App\Mail\DesempeñoMailable;

use App\Models\Datos;

class IdLinkController extends Controller
{
    public function createAutomatizacion(Request $request,$idEmpresa){
        $link = new idLink;
        $datos = new Datos;
        $categorias = [];

        foreach($request->categorias as $categoria){
            foreach($request->tiempo as $item => $tiempo){
                if($categoria == $item && $tiempo!=null){
                    $categorias[$categoria] = $tiempo;
                }
            }
        }
        dd($categorias);
    }

    public function createDesempeño(Request $request,$id){

        $link = new idLink;
        $datos = new Datos;

        $pass = [];
        $show = $request->except(['_token','email']);
        $email = $request->email;
        foreach($show as $key => $value){
            $pass[$key] = $value;
        }
        
        $link->nombre_desempeño = json_encode($pass);
        $link->empresa_id = $id;
        $link->save();
        
        $datos->nombre = $request->autoevaluacion[0];
        $datos->empresa_id = $id;
        $datos->mail = $request->email;
        $datos->save();

        $sendLink = $request->gethost() . '/encuesta/desempenio-laboral/' . $link->id . '/' . $datos->id;

        $correo = new DesempeñoMailable($sendLink);
        Mail::to($email)->send($correo);

        return redirect('/')->with('create.encuesta','Encuesta enviada con exito');
    }

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

        $correo = new EnviarMailable($sendLink);
        foreach($request->email as $email){
            if($email != null){
                Mail::to($email)->send($correo);
            }
        }
        return redirect('/')->with('create.encuesta','Encuesta enviada con exito');
    }

    /**
     * Display a listing of the resource.
     * INDEX DE CLIMA LABORAL
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
