<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = "reservaciones";
    protected $fillable = ['lugar_id', 'auto_id', 'cliente_id', 'fecha_inicio'];

    public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }

    public function auto()
    {
        return $this->belongsTo(Vehiculo::class,'auto_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
