<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;

    public function empresas()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function encuesta_clima()
    {
        return $this->belongsToMany(ClimaLaboral::class,'encuesta_clima','datos_id','pregunta_id')->withPivot('respuesta');
    }
    
    public function encuesta_desempenio()
    {
        return $this->belongsToMany(DesempenioLaboral::class,'encuesta_desempenio','datos_id','pregunta_id')->withPivot('respuesta','tipo','evaluado');
    }
}
