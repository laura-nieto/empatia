<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'empresa_id',
    ];
    
    public function empresas()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }
}
