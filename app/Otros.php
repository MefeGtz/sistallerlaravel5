<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Otros extends Model
{
    ////creamos una para la tabla a la que nos referimos
    protected $table='otros';
    protected $primaryKey='idotros';
    public $timestamps=false;
    protected $fillable =[
        'Tipo',
        'nomenclatura',
        'descripcion',
        'cantidad',
        'contenedor',
        'foto'
    ];
    protected $guarded =[ 

    ];
}
