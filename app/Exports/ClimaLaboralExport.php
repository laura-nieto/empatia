<?php

namespace App\Exports;

use App\Models\ClimaLaboral;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ClimaLaboralExport implements FromView,WithStyles
{
    protected $empresa;

    public function __construct($empresa)
    {
        $this->empresa = $empresa;
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
    public function view(): View
    {
        $array_datos = [];
        $datos = Datos::has('encuesta_clima')->where('empresa_id',$this->empresa)->select('id','nombre','mail','observacion','datos_demograficos','empresa_id')->get();
     
        $viewDatos = json_decode($datos[0]->datos_demograficos,true);
        foreach($viewDatos as $viewDato => $key){
            $viewDato = str_replace('_',' ',$viewDato);
            $array_datos[] = $viewDato;
        }
        
        return view('reporte.export.climaLaboral', [
            'preguntas' =>ClimaLaboral::all(),
            'datos' => Datos::has('encuesta_clima')->where('empresa_id',$this->empresa)->select('id','nombre','mail','observacion','datos_demograficos','empresa_id')->get(),
            'datos_demograficos' => $array_datos,
            'empresa' => $this->empresa
        ]);
    }
}