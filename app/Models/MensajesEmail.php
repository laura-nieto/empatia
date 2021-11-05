<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajesEmail extends Model
{
    use HasFactory;

    public function empresas()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }
}
