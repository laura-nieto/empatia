<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function datos()
    {
        return $this->hasMany(Datos::class, 'empresa_id');
    }
    public function emails()
    {
        return $this->hasMany(Email::class, 'empresa_id');
    }
    public function opcionesDemograficos()
    {
        return $this->belongsToMany(DatosDemograficos::class,'datos_empresas','empresa_id','demograficos_id')->withPivot('opciones');
    }
}
