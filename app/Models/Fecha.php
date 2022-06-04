<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fecha extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'fechas';

    // campo rellenables, aquellos campos que estan activados o habilitados
    // para sacar su valor desde un formulario desde un request
    protected $fillable = ['numero','inicio','termino'];

    // campos protegidos no rellenables
    // protected $guarded = ['id','created_at','updated_at','deleted_at'];

    public function partidos(){ // una fecha tiene muchos partidos
        return $this->hasMany('App\Models\Partido');
    }
}
