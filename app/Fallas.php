<?php

namespace sistallerl5;

use Illuminate\Database\Eloquent\Model;

class Fallas extends Model
{
    //
    protected $table='fallas';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable =[
        'titulo',
        'aparato',
        'marca',
        'modelo',
        'descripcion',
        'foto',
        'foto2'
    ];
    protected $guarded =[ 

    ];
}
