<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;

    public function empresas()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function encuesta_clima()
    {
        return $this->belongsToMany(ClimaLaboral::class,'encuesta_clima','datos_id','pregunta_id')->withPivot('respuesta');
    }
    
    public function encuesta_desempenio()
    {
        return $this->belongsToMany(DesempenioLaboral::class,'encuesta_desempenio','datos_id','pregunta_id')->withPivot('respuesta','tipo','evaluado');
    }

    public function encuesta_automatizacion()
    {
        return $this->belongsToMany(AutomatizacionPruebas::class,'encuesta_automatizacion','datos_id','pregunta_id')->withPivot('respuesta');
    }

    public function datos_categorias()
    {
        return $this->belongsToMany(Categoria::class,'datos_categorias','datos_id','categorias_id')->withPivot('respondio','tiempo');
    }
}
