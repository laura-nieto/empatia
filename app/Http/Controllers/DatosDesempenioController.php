<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosDesempenio;
use App\Models\Empresa;

use App\Exports\ExampleDatosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DatosDesempenioImport;


class DatosDesempenioController extends Controller
{
    public function download_plantilla()
    {
        return Excel::download(new ExampleDatosExport,'plantilla-datos.xlsx');
    }

    public function import_datos(Request $request,$idEmpresa)
    {
        Excel::import(new DatosDesempenioImport($idEmpresa), request()->file('importMail'));
        return redirect()->route('ver_datos_desempenio',[$idEmpresa])->with('success','Datos importados con exito');
    }

    public function cargar_vista($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        return view('crear.importarDatos',['empresa'=>$empresa]);
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
    public function create($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('crear.nuevoDatoDesempenio',['empresa'=>$empresa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idEmpresa)
    {
        // VALIDATION
        $rules=[
            '*'=>'required',
        ];
        $message=[
            'required' => 'El campo es obligatorio',
        ];
        $request->validate($rules,$message);

        // NUEVO DATO
        $newDato = new DatosDesempenio;
        $newDato->evaluador = $request->evaluador;
        $newDato->mail = $request->mail;
        $newDato->puesto_evaluador = $request->puesto_evaluador;
        $newDato->evaluado = $request->evaluado;
        $newDato->puesto_evaluado = $request->puesto_evaluado;
        $newDato->jerarquia = $request->jerarquia;
        $newDato->empresa_id = $idEmpresa;
        $newDato->save();
        
        return redirect()->route('ver_datos_desempenio',$idEmpresa)->with('success','El dato ha sido agregado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($empresa,$id)
    {
        $dato = DatosDesempenio::findOrFail($id);
        return view('modificar_dato',['dato'=>$dato]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$empresa,$id)
    {
        // VALIDATION
        $rules=[
            '*'=>'required',
        ];
        $message=[
            'required' => 'El campo es obligatorio',
        ];
        $request->validate($rules,$message);
        
        $dato = DatosDesempenio::findOrFail($id);
        $dato->evaluador = $request->evaluador;
        $dato->mail = $request->mail;
        $dato->puesto_evaluador = $request->puesto_evaluador;
        $dato->evaluado = $request->evaluado;
        $dato->puesto_evaluado = $request->puesto_evaluado;
        $dato->jerarquia = $request->jerarquia;
        $dato->save();

        return redirect()->route('ver_datos_desempenio',$empresa)->with('success','El dato ha sido modificado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($empresa,$id)
    {
        DatosDesempenio::findOrFail($id)->delete();
        return redirect()->route('ver_datos_desempenio',$empresa)->with('success','El dato ha sido eliminado.');
    }
}
