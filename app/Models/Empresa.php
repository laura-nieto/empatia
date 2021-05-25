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
}
