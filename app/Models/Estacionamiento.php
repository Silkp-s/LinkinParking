<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'lugar_matriz',

    ];
public function lugares()
    {
        return $this->hasMany(Lugar::class);
    }
}
