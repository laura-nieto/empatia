<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosDemograficos extends Model
{
    use HasFactory;
    
    public function opcionesDemograficos()
    {
        return $this->belongsToMany(Empresa::class,'datos_empresas','demograficos_id','empresa_id')->withPivot('opciones');
    }
}
