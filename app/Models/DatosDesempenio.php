<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosDesempenio extends Model
{
    use HasFactory;
    
    protected $table = 'datos_desempenio';

    public function encuesta_desempenio()
    {
        return $this->belongsToMany(DesempenioLaboral::class,'encuesta_desempenio','datos_id','pregunta_id')->withPivot('respuesta');
    }
}
