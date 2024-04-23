<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Aparatosh extends Model
{
    //
    //creamos una para la tabla a la que nos referimos
    protected $table='aparatosh';
    protected $primaryKey='idaparatosh';
    public $timestamps=false;
    protected $fillable =[
        'tipo',
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
