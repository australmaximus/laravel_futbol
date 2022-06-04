<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    use HasFactory;
    protected $table = 'estadios';
    protected $primaryKey = 'codigo';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function partidos(){ // un estadio tiene varios partidos
                                                    // FK          , PK
        return $this->hasMany('App\Models\Partido','estadio_codigo','codigo'); // se ponen parametros cuando la PK no es id autoincrementable,
    }
}
