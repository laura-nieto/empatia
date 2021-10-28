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
}
