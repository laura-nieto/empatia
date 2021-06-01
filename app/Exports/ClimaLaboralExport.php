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
        return view('reporte.export.climaLaboral', [
            'preguntas' =>ClimaLaboral::all(),
            'datos' => Datos::has('encuesta_clima')->where('empresa_id',$this->empresa)->select('id','nombre','genero','titulo','empresa_id')->get(),
            'empresa' => $this->empresa
        ]);
    }
}