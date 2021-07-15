<?php

namespace App\Http\Controllers;

use App\Models\idLink;
use Illuminate\Http\Request;

use Mail;
use App\Mail\EnviarMailable;
use App\Mail\DesempeñoMailable;
use App\Mail\AutomatizacionMailable;

use App\Models\DatosDemograficos;
use App\Models\Datos;
use App\Models\Email;

class IdLinkController extends Controller
{
    public function createAutomatizacion(Request $request,$idEmpresa){
        //  VALIDACION
        $rules = [
            'nombre' => 'required',
            'email' => 'required|email',
            'puesto'=> 'required'
        ];
        $message = [
            'required'=>'El campo es obligatorio',
            'email'=>'Debe ingresarse una dirección de correo correcta',
        ];
        $request->validate($rules,$message);
        
        $link = new idLink;
        $datos = new Datos;
        $categorias = [];
        $puesto['puestoAplicante'] = $request->puesto;

        foreach($request->categorias as $categoria){
            foreach($request->tiempo as $item => $tiempo){
                if($categoria == $item && $tiempo!=null){
                    $categorias[$categoria] = $tiempo;
                }
            }
        }

        $link->categorias_automatizacion = json_encode($categorias);
        $link->empresa_id = $idEmpresa;
        $link->save();

        $datos->nombre = $request->nombre;
        $datos->mail = $request->email;
        $datos->datos_demograficos = json_encode($puesto);
        $datos->empresa_id = $idEmpresa;
        $datos->save();

        //DATOS-CATEGORIA
        foreach($categorias as $categoria => $tiempo){
            $datos->datos_categorias()->attach($categoria,['tiempo'=>$tiempo]);
        }

        //ENVIAR MAIL
        $sendLink = $request->gethost() . '/encuesta/automatizacion-de-pruebas/' . $link->id . '/' . $datos->id;
        $correo = new AutomatizacionMailable($sendLink,$request->nombre,$request->puesto);
        Mail::to($request->email)->send($correo);

        return redirect('/')->with('create.automatizacion','Automatización enviada con exito');
    }

    public function createDesempeño(Request $request,$id){

        $show = $request->except(['_token','email']);
        
        foreach ($show as $puesto => $datos) {
            if ($puesto === 'autoevaluacion') {
                if(is_null($datos[0]) || is_null($datos[2])){
                    //TODOS LOS DATOS SON NULOS
                    return redirect()->back()->with('desempeño.send','asd');
                }elseif($datos[0] !=null && $datos[1]==null && $datos[2]!=null){
                    //EL MAIL ESTA VACIO
                    $pass[$puesto] = $datos;
                }elseif(!is_null($datos[0]) && !is_null($datos[1]) && !is_null($datos[2])){
                    $pass[$puesto] = $datos;
                }
            }else {
                foreach ($datos as $dato) {
                    if($dato === null){
                        break;
                    }else{
                        $pass[$puesto] = $datos;
                    }
                }
            }
        }
        
        $evaluado = $pass['autoevaluacion'];

        foreach ($pass as $puesto => $datos) {
            if(!is_null($datos[1])){
                if(!Datos::where('mail',$datos[1])->exists()){
                    $evaluado =[$puesto =>[$pass['autoevaluacion'][0],$pass['autoevaluacion'][2]]];
                    //CREACION LINK
                    $link = new idLink;
                    $link->nombre_desempeño = json_encode($evaluado);
                    $link->empresa_id = $id;
                    $link->save();
    
                    //CREACION DEL DATO
                    $createDato = new Datos;
                    $createDato->nombre = $datos[0];
                    $createDato->mail = $datos[1];
                    $createDato->empresa_id = $id;
                    $createDato->save();
                    $sendLink = $request->gethost() . '/encuesta/desempenio-laboral/' . $link->id . '/' . $createDato->id;
                    $evaluador = [$puesto,$datos[0],$datos[2]];
    
                    $correo = new DesempeñoMailable($sendLink,$evaluado,$evaluador);
                    Mail::bcc($createDato->mail)->send($correo);
                }else{
                    $evaluado =[$puesto =>[$pass['autoevaluacion'][0],$pass['autoevaluacion'][2]]];
                    //CREACION LINK
                    $link = new idLink;
                    $link->nombre_desempeño = json_encode($evaluado);
                    $link->empresa_id = $id;
                    $link->save();
    
                    $exist = Datos::where('mail',$datos[1])->first();
                    $sendLink = $request->gethost() . '/encuesta/desempenio-laboral/' . $link->id . '/' . $exist->id;
    
                    $evaluador = [$puesto,$datos[0],$datos[2]];
    
                    $correo = new DesempeñoMailable($sendLink,$evaluado,$evaluador);
                    Mail::bcc($exist->mail)->send($correo);
                }
            }
        }
            
        return redirect('/')->with('create.encuesta','Encuesta enviada con exito');
    }

    public function createClima(Request $request,$id){
        switch ($request->submitButton) {
            case 'Guardar Datos':
                foreach($request->email as $email){
                    if($email != null){
                        if (Email::where('empresa_id',$id)->where('email',$email)->doesntExist()){
                            $newEmail = new Email;
                            $newEmail->email = $email;
                            $newEmail->empresa_id = $id;
                            $newEmail->save();
                        }
                    }
                }
                return redirect('/enviar/clima-laboral/'.$id)->with('create.emails','Emails guardados con exito');
            default:
                $link = new idLink;
                $datos_demograficos = DatosDemograficos::all();
                $show = $request->except(['who_send','_token','email','submitButton']);

                $link->preguntar_datos = json_encode($show);
                $link->empresa_id = $id;
                $link->save();
        
                $sendLink = $request->gethost() . '/encuesta/clima-laboral/' . $link->id;
        
                $correo = new EnviarMailable($sendLink);
                foreach($request->email as $email){
                    if($email != null){
                        Mail::bcc($email)->send($correo);
                    }
                }
            return redirect('/')->with('create.encuesta','Encuesta enviada con exito');
        } 
    }

    /**
     * Display a listing of the resource.
     * INDEX DE CLIMA LABORAL
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idLink = idLink::findOrFail($id);
        $datos = DatosDemograficos::all();
        $pass = [];
        $preg_datos = json_decode($idLink->preguntar_datos,true);

        $empresa = $idLink->empresa_id;
        return view('encuesta.general',['datos'=>$preg_datos,'empresa_id'=>$empresa]);
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
