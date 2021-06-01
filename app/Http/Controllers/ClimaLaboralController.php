<?php

namespace App\Http\Controllers;

use App\Models\ClimaLaboral;
use Illuminate\Http\Request;

use App\Exports\ClimaLaboralExport;
use Maatwebsite\Excel\Facades\Excel;

class ClimaLaboralController extends Controller
{
    public function export($idEmpresa){
        return Excel::download(new ClimaLaboralExport($idEmpresa), 'climaLaboral.xlsx');
    }

    public function page1()
    {
        $preguntas = ClimaLaboral::take(10)->get();
        
        return view('encuesta.climaLaboral',['preguntas'=>$preguntas]);
    }
    public function page2(Request $request) 
    {
        $preguntas = ClimaLaboral::skip(10)->take(10)->get();

        return view('encuesta.climaLaboral',['preguntas'=>$preguntas]);
    }
    public function page3()
    {
        $preguntas = ClimaLaboral::skip(20)->take(10)->get();

        return view('encuesta.climaLaboral',['preguntas'=>$preguntas]);
    }
    public function page4()
    {
        $preguntas = ClimaLaboral::skip(30)->take(10)->get();

        return view('encuesta.climaLaboral',['preguntas'=>$preguntas]);
    }
    public function page5()
    {
        $preguntas = ClimaLaboral::skip(40)->take(10)->get();

        return view('encuesta.climaLaboral',['preguntas'=>$preguntas]);
    }
    public function page6()
    {
        $preguntas = ClimaLaboral::skip(50)->take(5)->get();

        return view('encuesta.climaLaboral',['preguntas'=>$preguntas]);
    }
    public function page7()
    {
        $preguntas = ClimaLaboral::skip(55)->take(5)->get();

        return view('encuesta.climaLaboralLibre',['preguntas'=>$preguntas]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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
    public function store(Request $request,$id,$datos)
    {   
        if( last($request->segments()) == 'page=7'){
            foreach($request->except('_token') as $pregunta => $respuesta){
                if ($request->filled($pregunta)) {
                    $guardar = ClimaLaboral::find($pregunta);
    
                    $guardar->datos()->attach($datos,['respuesta'=>$respuesta]);
                } 
            }
        }else {
            foreach($request->except('_token') as $pregunta => $respuesta){
                $guardar = ClimaLaboral::find($pregunta);
    
                $guardar->datos()->attach($datos,['respuesta'=>$respuesta]);
            }
        }
        
        switch (last($request->segments())){
            case 'page=1':
                return redirect()->route('clima_pag2',['id'=>$id,'datos'=>$datos]);            
            case 'page=2':
                return redirect()->route('clima_pag3',['id'=>$id,'datos'=>$datos]);
            case 'page=3':
                return redirect()->route('clima_pag4',['id'=>$id,'datos'=>$datos]);
            case 'page=4':
                return redirect()->route('clima_pag5',['id'=>$id,'datos'=>$datos]);
            case 'page=5':
                return redirect()->route('clima_pag6',['id'=>$id,'datos'=>$datos]);
            case 'page=6':
                return redirect()->route('clima_pag7',['id'=>$id,'datos'=>$datos]);
            case 'page=7':
                return view('encuesta.fin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClimaLaboral  $climaLaboral
     * @return \Illuminate\Http\Response
     */
    public function show(ClimaLaboral $climaLaboral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClimaLaboral  $climaLaboral
     * @return \Illuminate\Http\Response
     */
    public function edit(ClimaLaboral $climaLaboral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClimaLaboral  $climaLaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClimaLaboral $climaLaboral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClimaLaboral  $climaLaboral
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClimaLaboral $climaLaboral)
    {
        //
    }
}
