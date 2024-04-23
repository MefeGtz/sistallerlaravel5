<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Flybacks extends Model
{
    ////creamos una para la tabla a la que nos referimos
    protected $table='flybacks';
    protected $primaryKey='idflybacks';
    public $timestamps=false;
    protected $fillable =[
        'nomenclatura',
        'descripcion',
        'foto',
        'foto2',
        'foto3',
        'ubicacion'

    ];
    protected $guarded =[ 

    ];
}
