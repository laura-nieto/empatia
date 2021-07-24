<?php

namespace App\Exports;

use App\Models\AutomatizacionPruebas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class AutomatizacionCategoriaSheet implements FromView,WithTitle
{

    private $datos;
    private $categoria;

    public function __construct($datos,$categoria){
        $this->datos = $datos;
        $this->categoria = $categoria;
    }

    public function view(): View
    {
        $dato = $this->datos->encuesta_automatizacion->where('category_id',$this->categoria->id);
        switch ($this->categoria->id) {
            case 1:
                return view('reporte.export.automatizacionCategorias.kenstel',[
                    'persona' => $dato
                ]);
            case 2:
                return view('reporte.export.automatizacionCategorias.moss',[
                    'persona' => $dato
                ]);
            case 3:
                return view('reporte.export.automatizacionCategorias.barsit',[
                    'persona' => $dato
                ]);
            case 4:
                return view('reporte.export.automatizacionCategorias.kostick',[
                    'persona' => $dato
                ]);
            case 5:
                return view('reporte.export.automatizacionCategorias.valanti',[
                    'persona' => $dato
                ]);
            case 6:
                return view('reporte.export.automatizacionCategorias.wonderlick',[
                    'persona' => $dato
                ]);
            case 7:
                return view('reporte.export.automatizacionCategorias.bfq',[
                    'persona' => $dato
                ]);
            case 8:
                $preguntas = AutomatizacionPruebas::where('category_id',8)->get();
                return view('reporte.export.automatizacionCategorias.disc',[
                    'persona' => $dato,
                    'preguntas' => $preguntas
                ]);
            case 9:
                return view('reporte.export.automatizacionCategorias.asertividad',[
                    'persona' => $dato,
                ]);
            case 10:
                return view('reporte.export.automatizacionCategorias.liderazgo',[
                    'persona' => $dato,
                ]);
            case 11:
                return view('reporte.export.automatizacionCategorias.estres',[
                    'persona' => $dato,
                ]);
            case 12:
                return view('reporte.export.automatizacionCategorias.ice',[
                    'persona' => $dato,
                ]);
        }
    }

    public function title(): string
    {
        return $this->categoria->nombre;
    }
}
