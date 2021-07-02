<?php

namespace App\Imports;

use App\Models\Email;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmailsImport implements ToModel, WithHeadingRow
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
        return new Email([
            'email' => $row['email'] ?? $row['correo'],
            'empresa_id'=>$this->empresa
        ]);
    }
}
