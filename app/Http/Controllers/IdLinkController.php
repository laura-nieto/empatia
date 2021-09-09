<?php

namespace App\Http\Controllers;

use App\Models\idLink;
use Illuminate\Http\Request;

use Mail;
use App\Mail\EnviarMailable;
use App\Mail\DesempenioMailable;
use App\Mail\AutomatizacionMailable;

use App\Models\DatosDemograficos;
use App\Models\Datos;
use App\Models\Email;
use App\Models\Empresa;
use App\Models\DatosDesempenio;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DatosClimaImport;

class IdLinkController extends Controller
{
    public function importDatos(Request $request,$idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa)->nombre;
        
        Excel::import(new DatosClimaImport($idEmpresa), request()->file('importMail'));
        // $array = Excel::toArray(new DatosClimaImport($idEmpresa), request()->file('importMail'));
        // $valores = $array[0][0];
        // unset($valores['nombre'],$valores['email']);
        // foreach ($valores as $key => $value) {
        //     $pass[] = $key;
        // }
        // $link = new idLink;
        // $link->preguntar_datos = json_encode($pass);
        // $link->empresa_id = $idEmpresa;
        // $link->save();
        // $idLink = $link->id;
      
        // foreach ($array as $personas) {
        //     foreach ($personas as $persona) {
        //         $nombre = $persona['nombre'];
        //         $email = $persona['email'];
                
        //         $findPersona = Datos::where('empresa_id',$idEmpresa)->where('nombre',$nombre)->where('mail',$email)->first();
        //         $sendLink = $request->gethost() . '/encuesta/clima-laboral/' . $idLink . '/' . $findPersona->id;

        //         $correo = new EnviarMailable($sendLink,$nombre,$empresa);
        //         Mail::bcc($email)->send($correo);
        //     }
        // }
        return redirect()->route('enviarClima',[$idEmpresa])->with('import.datos', 'Datos improtados');
    }

    public function createAutomatizacion(Request $request,$idEmpresa){
        //  VALIDACION
        $rules = [
            'nombre' => 'required',
            'email' => 'required|email',
            'empresa'=> 'required'
        ];
        $message = [
            'required'=>'El campo es obligatorio',
            'email'=>'Debe ingresarse una dirección de correo correcta',
        ];
        $request->validate($rules,$message);
        
        $link = new idLink;
        $datos = new Datos;
        $categorias = [];

        foreach($request->categorias as $categoria){
            foreach($request->tiempo as $item => $tiempo){
                if($categoria == $item && $tiempo!=null){
                    $categorias[$categoria] = $tiempo;
                }if($categoria==$item && is_null($tiempo)) {
                    return redirect()->back()->with('automatizacion.error','A una de las categorias no se le ingresó el tiempo.')->withInput();
                } 
            }
        }

        $link->categorias_automatizacion = json_encode($categorias);
        $link->empresa_id = $idEmpresa;
        $link->save();

        $datos->nombre = $request->nombre;
        $datos->mail = $request->email;
        $datos->empresa_id = $idEmpresa;
        $datos->save();

        //DATOS-CATEGORIA
        foreach($categorias as $categoria => $tiempo){
            $datos->datos_categorias()->attach($categoria,['tiempo'=>$tiempo]);
        }

        //ENVIAR MAIL
        $sendLink = $request->gethost() . '/encuesta/automatizacion-de-pruebas/' . $link->id . '/' . $datos->id;
        $correo = new AutomatizacionMailable($sendLink,$request->nombre,$request->empresa);
        Mail::to($request->email)->send($correo);

        return redirect('/')->with('create.automatizacion','Automatización enviada con exito');
    }

    public function createDesempeño(Request $request,$id){

        $show = $request->except(['_token','email','submitButton']);
        $empresa = Empresa::findOrFail($id)->nombre;
        switch ($request->submitButton) {
            case 'Guardar Datos':
                //Evaluar que evaluador no este vacio
                foreach ($show as $puesto => $datos) {
                    if ($puesto === 'autoevaluacion') {
                        if(is_null($datos[0]) || is_null($datos[2]) || $datos[1]==null){
                            //TODOS LOS DATOS SON NULOS
                            return redirect()->back()->with('desempeño.send','asd');
                        }
                    }else{
                        if (!array_filter($show[$puesto])) {
                            
                        }else{
                            if(is_null($datos[0]) || is_null($datos[2]) || $datos[1]==null){
                                //TODOS LOS DATOS SON NULOS
                                return redirect()->back()->with('desempeño.error','Uno de los campos no fue completado correctamente');
                            }else{
                                $pass[$puesto]=$datos;
                            }
                        }
                    }
                }
                if (empty($pass)) {
                    return redirect()->back()->with('desempeño.error','Debe ingresar al menos un evaluador');
                }
                if (!DatosDesempenio::where('mail',$show['autoevaluacion'][1])->where('jerarquia','autoevaluacion')->where('evaluador',$show['autoevaluacion'][0])->where('empresa_id',$id)->where('enviado',false)->exists()) {
                    $newDato = new DatosDesempenio;
                    $newDato->evaluador = $show['autoevaluacion'][0];
                    $newDato->mail = $show['autoevaluacion'][1];
                    $newDato->puesto_evaluador = $show['autoevaluacion'][2];
                    $newDato->empresa_id = $id;
                    $newDato->evaluado = $show['autoevaluacion'][0];
                    $newDato->puesto_evaluado = $show['autoevaluacion'][2];
                    $newDato->jerarquia = 'autoevaluacion';
                    $newDato->save();
                }
                foreach($pass as $key => $persona){
                    if ($key != 'autoevaluacion') {
                        if (is_null($persona[1])) {
                            return redirect()->back()->with('desempeño.error','Uno de los Puestos no fue completado');
                        }else{
                            $newDato = new DatosDesempenio;
                            $newDato->evaluador= $persona[0];
                            $newDato->mail= $persona[1];
                            $newDato->puesto_evaluador = $persona[2];

                            $newDato->empresa_id = $id;
                            $newDato->evaluado =  $show['autoevaluacion'][0];
                            $newDato->puesto_evaluado = $show['autoevaluacion'][2];
                            $newDato->jerarquia = $key;
                            $newDato->save();
                        }
                    }
                }
                
                return redirect()->route('desempenioEnviar',[$id])->with('desempeño.guardar','Los datos fueron guardados exitosamente');

            default:
                $enviar = DatosDesempenio::where('empresa_id',$id)->where('enviado',0)->get()->sortBy('jerarquia')->groupBy('mail');
                foreach ($enviar as $evaluador) {

                    $pass = [];
                    $alEmail = [];

                    $link = new idLink;
                    $link->empresa_id = $id;
                    foreach ($evaluador as $evaluado) {
                        $pass[] = $evaluado->id;
                        $guardarDato = [$evaluado->evaluador,$evaluado->mail];
                    }
                    $link->nombre_desempeño = json_encode($pass);
                    $link->save();
                    
                    $createDato = new Datos;
                    $createDato->nombre = $guardarDato[0];
                    $createDato->mail = $guardarDato[1];
                    $createDato->empresa_id = $id;
                    $createDato->save();
                    
                    $nombreEvaluador = $createDato->nombre;
                    $sendLink = $request->gethost() . '/encuesta/desempenio-laboral/' . $link->id;
                    $correo = new DesempenioMailable($sendLink,$empresa,$nombreEvaluador);
                    Mail::bcc($createDato->mail)->send($correo);
                    foreach ($evaluador as $evaluado) {
                        $evaluado->enviado = 1;
                        $evaluado->save();
                    }
                }
                return redirect('/')->with('create.encuesta','Encuesta enviada con exito');
        }
    }

    public function createClima(Request $request,$id){
        switch ($request->submitButton) {
            case 'Guardar Datos':
                if ($request->email && $request->nombre) {
                    $emails = $request->email;
                    $nombres = $request->nombre;
                    foreach($emails as $key => $email){
                        foreach ($nombres as $keyN => $nombre) {
                            if ($key == $keyN) {
                                if (is_null($email) && is_null($nombre) || is_null($email) && !is_null($nombre) || is_null($nombre) && !is_null($email)) {
                                    # code...
                                } else {
                                    if (Email::where('empresa_id',$id)->where('email',$email)->doesntExist()){
                                        $newEmail = new Email;
                                        $newEmail->email = $email;
                                        $newEmail->nombre = $nombre;
                                        $newEmail->empresa_id = $id;
                                        $newEmail->save();
                                    }
                                }
                            }
                        }
                    }
                    return redirect('/enviar/clima-laboral/'.$id)->with('create.emails','Emails guardados con exito');
                }else{
                    return redirect()->back();
                }
            default:
                $link = new idLink;
                $datos_demograficos = DatosDemograficos::all();
                $show = $request->except(['who_send','_token','email','nombre','submitButton','importados']);    
                if (empty($show)) {
                    return redirect()->back()->with('null','Deben ingresarse datos demograficos');
                }
                $link->preguntar_datos = json_encode($show);
                $link->empresa_id = $id;
                $link->save();
        
                //$sendLink = $request->gethost() . '/encuesta/clima-laboral/' . $link->id;
                $emails = $request->email;
                $nombres = $request->nombre;
                $nombreEmpresa = Empresa::findOrFail($id)->nombre;
                

                if (!is_null($emails) && !is_null($nombres)) {
                    foreach ($emails as $key => $email) {
                        foreach ($nombres as $keyN => $nombre) {
                            if ($key == $keyN) {
                                if (is_null($email) && is_null($nombre) ) {
                                    # code...
                                } elseif (is_null($email) && !is_null($nombre) || is_null($nombre) && !is_null($email)) {
                                    return redirect()->back()->with('null','Algún campo quedó vacío');
                                } else {
                                    //CREACION DEL DATO
                                    $createDato = new Datos;
                                    $createDato->nombre = $nombre;
                                    $createDato->mail = $email;
                                    $createDato->empresa_id = $id;
                                    $createDato->save();

                                    $sendLink = $request->gethost() . '/encuesta/clima-laboral/' . $link->id . '/' . $createDato->id;
                                    $correo = new EnviarMailable($sendLink,$nombre,$nombreEmpresa);
                                    Mail::bcc($email)->send($correo);
                                }
                            }
                        }
                    }
                }
                $importados = $request->importados;
                if (!is_null($importados)) {
                    foreach($importados as $key => $person){
                        if(!is_null($person[0]) && !is_null($person[1])){
                            $sendLink = $request->gethost() . '/encuesta/clima-laboral/' . $link->id . '/' . $key;
                            $correo = new EnviarMailable($sendLink,$person[0],$nombreEmpresa);
                            Mail::bcc($person[1])->send($correo);
                        }
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
    public function index($id,$idDatos)
    {
        $idLink = idLink::findOrFail($id);
        $datos = Datos::findOrFail($idDatos);
        if (!$datos->links->isEmpty()) {
            return redirect()->route('finalizarClima',[$id,$idDatos]);
        }
        $preg_datos = json_decode($idLink->preguntar_datos,true);
        
        $empresa = $idLink->empresa_id;
        $vistaEmpresa = $datos->empresas;
        return view('encuesta.general',['datos'=>$preg_datos,'persona'=>$datos,'empresa_id'=>$empresa,'empresa'=>$vistaEmpresa]);
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
