<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Transistores extends Model
{
    //
    //creamos una para la tabla a la que nos referimos
    protected $table='transistores';
    protected $primaryKey='idtransistores';
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
