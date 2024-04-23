<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Controles extends Model
{
    //////creamos una para la tabla a la que nos referimos
    protected $table='controles';
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
