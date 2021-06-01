<?php

namespace App\Exports;

use App\Models\DesempenioLaboral;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class DesempenioLaboralExport implements FromView
{
    protected $empresa;

    public function __construct($empresa)
    {
        $this->empresa = $empresa;
    }
    public function view(): View
    {
        $auto = Datos::has('encuesta_desempenio')->where('empresa_id',$this->empresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','autoevaluacion');
        }])->get();

        $supervisor = Datos::has('encuesta_desempenio')->where('empresa_id',$this->empresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','supervisor');
        }])->get();

        $subalterno = Datos::has('encuesta_desempenio')->where('empresa_id',$this->empresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','subalterno');
        }])->get();

        $companiero = Datos::has('encuesta_desempenio')->where('empresa_id',$this->empresa)->with(['encuesta_desempenio' => function($query){
            $query->wherePivot('tipo','companiero');
        }])->get();

        return view('reporte.export.desempenioLaboral', [
            'preguntas' =>DesempenioLaboral::all(),
            'autoevaluacion' => $auto,
            'supervisor' => $supervisor,
            'subalterno' => $subalterno,
            'companiero' => $companiero,
            'empresa' => $this->empresa
        ]);
    }
}
