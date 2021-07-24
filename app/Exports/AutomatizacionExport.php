<?php

namespace App\Exports;

use App\Models\AutomatizacionPruebas;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromView;
// use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class AutomatizacionExport implements WithMultipleSheets
{
    protected $persona;
    protected $categories;

    public function __construct($persona,$categories)
    {
        $this->persona = $persona;
        $this->categories = $categories;
    }
    
    public function sheets(): array
    {
        $sheets = [];
        $datos = Datos::find($this->persona)->load(['encuesta_automatizacion','datos_categorias']);

        for ($i=0; $i < count($this->categories); $i++) {
            $sheets[]= new AutomatizacionCategoriaSheet($datos,$this->categories[$i]);
        }
        return $sheets;
    }
}
