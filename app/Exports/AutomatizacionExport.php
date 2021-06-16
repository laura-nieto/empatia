<?php

namespace App\Exports;

use App\Models\AutomatizacionPruebas;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class AutomatizacionExport implements FromView
{
    protected $empresa;
    protected $persona;

    public function __construct($empresa,$persona)
    {
        $this->empresa = $empresa;
        $this->persona = $persona;
    }
    
    public function view(): View
    {
        $datos = Datos::find($this->persona)->load(['encuesta_automatizacion','datos_categorias']);
        return view('reporte.export.AutomatizacionLaboral',[
            'persona' => $datos
        ]);
    }
}
