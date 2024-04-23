<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Placas extends Model
{
    ////creamos una para la tabla a la que nos referimos
    protected $table='placas';
    protected $primaryKey='idplacas';
    public $timestamps=false;
    protected $fillable =[
        'marca',
        'modelo',
        'descripcion',
        'foto',
        'foto2'
    ];
    protected $guarded =[ 

    ];
}
