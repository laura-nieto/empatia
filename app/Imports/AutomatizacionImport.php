<?php

namespace App\Imports;

use App\Models\AutomatizacionPruebas;
use Maatwebsite\Excel\Concerns\ToModel;

class AutomatizacionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AutomatizacionPruebas([
            'pregunta' => $row[0],
            'opciones' => $row[1],
            'category_id' => $row[2],
            'imagen'=>$row[3],
            'position'=>$row[4]
        ]);
    }
}
