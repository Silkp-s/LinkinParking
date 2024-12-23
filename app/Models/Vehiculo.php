<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patente',
        'id_cliente',

    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente'); 
    }
    

    public function lugar()
    {
        return $this->hasOne(Lugar::class);
    }

    public function reservaciones()
{
    return $this->hasMany(Reservacion::class);
}
}
