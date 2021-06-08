<?php

namespace App\Exports;

use App\Models\ClimaLaboral;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class ClimaLaboralExport implements FromView
{
    protected $empresa;

    public function __construct($empresa)
    {
        $this->empresa = $empresa;
    }
    public function view(): View
    {
        $array_datos = [];
        $datos = Datos::has('encuesta_clima')->where('empresa_id',$this->empresa)->select('id','nombre','mail','observacion','datos_demograficos','empresa_id')->get();
        foreach($datos as $dato){
            $viewDatos = json_decode($dato->datos_demograficos,true);
            foreach($viewDatos as $viewDato => $key){
                $viewDato = str_replace('_',' ',$viewDato);
                $array_datos[] = $viewDato;
            }
        }
        return view('reporte.export.climaLaboral', [
            'preguntas' =>ClimaLaboral::all(),
            'datos' => Datos::has('encuesta_clima')->where('empresa_id',$this->empresa)->select('id','nombre','mail','observacion','datos_demograficos','empresa_id')->get(),
            'datos_demograficos' => $array_datos,
            'empresa' => $this->empresa
        ]);
    }
}