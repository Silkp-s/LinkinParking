<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor_minuto',
        'cantidad_lugares'
    ];
public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }
    
public function valor()
    {
        return $this->belongsTo(Valor::class, 'valor_id', 'id'); // 'valor_id' es la clave foránea en 'lugares'
    }

}
