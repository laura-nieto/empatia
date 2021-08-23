<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\DesempenioLaboral;
use App\Models\DatosDesempenio;


class DesempenioSheetExport implements FromView,WithTitle
{

    private $type;
    private $idEmpresa;

    public function __construct($type,$idEmpresa){
        $this->type = $type;
        $this->idEmpresa = $idEmpresa;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $auto = DatosDesempenio::has('encuesta_desempenio')->where('jerarquia',$this->type)->where('empresa_id',$this->idEmpresa)->get()->sortBy('evaluado');
        return view('reporte.export.desempenioLaboral', [
            'preguntas' =>DesempenioLaboral::all(),
            'all' => $auto,
        ]);
    }

    public function title(): string
    {
        return $this->type;
    }
}
