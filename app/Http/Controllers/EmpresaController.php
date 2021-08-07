<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function vistaCargarDatos($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        return view('crear.importarDatos',['empresa'=>$empresa]);
    }
    public function vistaCargarMail($idEmpresa)
    {
        $empresa = Empresa::findOrFail($idEmpresa);
        return view('crear.importarClima',['empresa'=>$empresa]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Empresa::orderByDesc('created_at')->get();
        return view('elegirEmpresa',['empresas'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newEmpresa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ];
        $message = [
            'required'=>'El campo es obligatorio',
            'image' => 'El archivo debe ser una imágen',
            'mimes' => 'La imágen debe ser jpeg,png,jpg o svg',
            'max' => 'El archivo debe como máximo :max kb'
        ];
        
        $validate = $request->validate($rules,$message);

        $company = new Empresa;
        $company->nombre = $request->name;
        
        if($request->hasfile('logo')){
            $nameImg = $request->name . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('img/empresas'), $nameImg);
            //$path = $request->file('logo')->storeAs('logos',$nameImg);
            $company->logo = $nameImg;
        }
        $company->save();

        return redirect('/')->with('create.empresa','Empresa creada con éxito');
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
    public function edit()
    {
        $company = Empresa::orderByDesc('created_at')->get();
        return view('borrarEmpresa',['empresas'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return redirect('/delete/empresa')->with('delete.empresa','La empresa fue eliminada');
    }
}
