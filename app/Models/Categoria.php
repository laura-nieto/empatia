<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function automatizacion()
    {
        return $this->hasMany(AutomatizacionPruebas::class, 'category_id');
    }

    public function datos_categorias()
    {
        return $this->belongsToMany(Datos::class,'datos_categorias','categorias_id','datos_id')->withPivot('respondio','tiempo');
    }
}
