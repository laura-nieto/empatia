<?php

namespace App\Imports;

use App\Models\Datos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DatosClimaImport implements ToModel,WithHeadingRow
{    
    protected $empresa;

    public function __construct($empresa)
    {
        $this->empresa = $empresa;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $valores = $row;
        unset($valores['nombre'],$valores['email'],$valores['']);
        return new Datos([
            'mail' => $row['email'],
            'nombre'=>$row['nombre'],
            'datos_demograficos'=>json_encode($valores),
            'empresa_id'=>$this->empresa,
            'importado' => true
        ]);
    }
}
