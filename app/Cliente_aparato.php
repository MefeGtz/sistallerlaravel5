<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Cliente_aparato extends Model
{
    //
    protected $table='cliente_aparato';
    protected $primaryKey='idclienteaparato';
    public $timestamps=false;
    protected $fillable =[
        'nombre_apellido',
        'direccion',
        'telefono',
        'aparato',
        'marca',
        'modelo',
        'descripcion',
        'estado',
        'f_ingreso',
        'f_entrega',
        'imagenaparato',
        'cobro'
    ];
    protected $guarded =[ 

    ];

}
