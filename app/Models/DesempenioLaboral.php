<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesempenioLaboral extends Model
{
    use HasFactory;

    protected $table = 'desempenio_laboral';

    public function datos()
    {
        return $this->belongsToMany(Datos::class,'encuesta_desempenio','pregunta_id','datos_id')->withPivot('respuesta','tipo','evaluado');
    }
}
