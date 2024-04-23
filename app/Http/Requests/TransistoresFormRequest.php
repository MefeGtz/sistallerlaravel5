<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class TransistoresFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // esta debe de estar en true durante estemos creando la aplicacion 
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
        // reglas de los formularios
        return [
            //'tipo'=>'required|max:60',
            'nomenclatura'=>'required',
            'descripcion'=>'max:255',
            'cantidad'=>'required',
            'contenedor'=>'max:45',
        ];
    }
}
