<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idLink extends Model
{
    use HasFactory;

    public function dato()
    {
        return $this->belongsToMany(Datos::class,'link_dato','link_id','datos_id')->withPivot('respondio');
    }
}
