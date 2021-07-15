<?php

namespace App\Exports;

use App\Models\DesempenioLaboral;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DesempenioLaboralExport implements FromView,WithStyles
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
        $auto = Datos::has('encuesta_desempenio')->where('empresa_id',$this->empresa)->get();

        return view('reporte.export.desempenioLaboral', [
            'preguntas' =>DesempenioLaboral::all(),
            'all' => $auto,
            'empresa' => $this->empresa
        ]);
    }
}
