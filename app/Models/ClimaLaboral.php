<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClimaLaboral extends Model
{
    use HasFactory;

    protected $table = 'clima_laboral';

    public function datos()
    {
        return $this->belongsToMany(Datos::class,'encuesta_clima','pregunta_id','datos_id')->withPivot('respuesta');
    }
}
