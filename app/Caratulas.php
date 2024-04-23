<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Caratulas extends Model
{
    ////////creamos una para la tabla a la que nos referimos
    protected $table='caratulas';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable =[
        'marca',
        'modelo',
        'descripcion',
        'imagen'
    ];
    
    protected $guarded =[ 

    ];
}
