<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Papedir extends Model
{
    ////creamos una para la tabla a la que nos referimos
    protected $table='papedir';
    protected $primaryKey='idpapedir';
    public $timestamps=false;
    protected $fillable =[
        'tipo',
        'nomenclatura',
        'descripcion',
        'cantidad',
        'imagen'
    ];
    protected $guarded =[ 

    ];
}
