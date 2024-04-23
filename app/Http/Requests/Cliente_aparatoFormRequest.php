<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class Cliente_aparatoFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre_apellido'=>'required',
            'direccion'=>'required|max:45',
            'telefono'=>'max:30',
            'aparato'=>'required|max:45',
            'marca'=>'required|max:55',
            'modelo'=>'required|max:45',
            'descripcion'=>'required|max:245',
            'estado'=>'required|max:45',
            'f_ingreso'=>'required',
            'f_entrega'=>'',
            'imagenaparato'=>'mimes:jpeg,bmp,png',
            'cobro'=>'max:30',
        ];
    }
}
