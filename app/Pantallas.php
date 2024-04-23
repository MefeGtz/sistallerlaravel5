<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Pantallas extends Model
{
    ////creamos una para la tabla a la que nos referimos
    protected $table='pantallas';
    protected $primaryKey='idpantallas';
    public $timestamps=false;
    protected $fillable =[
        'marca',
        'modelo',
        'descripcion',
        'cantidad',
        'imagen',
        'ubicacion'
    ];
    protected $guarded =[ 

    ];
}
