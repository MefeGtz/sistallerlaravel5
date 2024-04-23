<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Ics extends Model
{
    ////creamos una para la tabla a la que nos referimos
    protected $table='ics';
    protected $primaryKey='idics';
    public $timestamps=false;
    protected $fillable =[
        'nomenclatura',
        'descripcion',
        'cantidad',
        'contenedor'
    ];
    protected $guarded =[ 

    ];
}
