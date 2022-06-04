<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table = 'jugadores';

    // 1 jugador pertenece a un equipo, en singular
    public function equipo(){
        return $this->belongsTo('App\Models\Equipo');
    }
}
