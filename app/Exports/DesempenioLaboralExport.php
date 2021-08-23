<?php

namespace App\Exports;

// use App\Models\DesempenioLaboral;
// use App\Models\DatosDesempenio;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromView;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\WithStyles;
// use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class DesempenioLaboralExport implements WithMultipleSheets
{
    protected $empresa;

    public function __construct($empresa)
    {
        $this->empresa = $empresa;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[]= new DesempenioSheetExport('autoevaluacion',$this->empresa);
        $sheets[]= new DesempenioSheetExport('companiero',$this->empresa);
        $sheets[]= new DesempenioSheetExport('subalterno',$this->empresa);
        $sheets[]= new DesempenioSheetExport('supervisor',$this->empresa);
        
        return $sheets;
    }
}
