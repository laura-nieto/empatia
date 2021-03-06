<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail',
        'nombre',
        'empresa_id',
        'datos_demograficos',
        'importado'
    ];

    public function empresas()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function encuesta_clima()
    {
        return $this->belongsToMany(ClimaLaboral::class,'encuesta_clima','datos_id','pregunta_id')->withPivot('respuesta');
    }

    public function encuesta_automatizacion()
    {
        return $this->belongsToMany(AutomatizacionPruebas::class,'encuesta_automatizacion','datos_id','pregunta_id')->withPivot('respuesta');
    }

    public function datos_categorias()
    {
        return $this->belongsToMany(Categoria::class,'datos_categorias','datos_id','categorias_id')->withPivot('respondio','tiempo');
    }

    public function links()
    {
        return $this->belongsToMany(idLink::class,'link_dato','datos_id','link_id')->withPivot('respondio');
    }
}
