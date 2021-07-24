<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomatizacionPruebas extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregunta',
        'opciones',
        'category_id',
        'imagen'
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function datos()
    {
        return $this->belongsToMany(Datos::class,'encuesta_automatizacion','pregunta_id','datos_id')->withPivot('respuesta');
    }
}
