<?php

namespace App\Imports;

use App\Models\DatosDesempenio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DatosDesempenioImport implements ToModel,WithHeadingRow
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
        return new DatosDesempenio([
            'evaluador'=>$row['evaluador'],
            'mail'=>$row['email'],
            'puesto_evaluador'=> $row['puesto_del_evaluador'],
            'evaluado' => $row['evaluado'],
            'puesto_evaluado' => $row['puesto_del_evaluado'],
            'jerarquia' => trim(strtolower($row['jerarquia'])),
            'empresa_id' => $this->empresa
        ]);
    }
}
