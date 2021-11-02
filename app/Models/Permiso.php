<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'clima',
        'desempenio',
        'kenstel','moss','barsit','kostick','valanti','wonderlick','bfq','disc','asertividad','liderazgo','estres','ice'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function automatizacion()
    {
        if ($this->kenstel ||$this->moss || $this->barsit || $this->kostick || $this->valanti || $this->wonderlick || $this->bfq || $this->disc || $this->asertividad || $this->liderazgo ||$this->estres || $this->ice) {
            //EXISTE EL PERMISO EN ALGUNA CATEGORIA DE AUTOMATIZACION
            return true;  
        }else{
            //NO EXISTE EL PERMISO
            return false;
        }
    }
}
