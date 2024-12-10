<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $fillable = [
        'lugar_matriz'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function estacionamiento()
    {
        return $this->belongsTo(Estacionamiento::class);
    }

    public function valor()
    {
        return $this->hasOne(Valor::class);
    }
}
