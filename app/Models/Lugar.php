<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $table = "lugars";
    
    protected $fillable = [
        'lugar_matriz'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class,'id_vehiculo');
    }

    public function estacionamiento()
    {
        return $this->belongsTo(Estacionamiento::class);
    }

    public function valor()
    {
        return $this->belongsTo(Valor::class,'valor_id', 'id');
    }

        public function reservaciones()
    {
        return $this->hasMany(Reservacion::class);
    }
}
