<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class AparatoshFormRequest extends Request
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
            // los nombres primeros son de los elementos en el formulario html
            'tipo'=>'required|max:60',
            'marca'=>'required',
            'modelo'=>'max:45',
            'descripcion'=>'required|max:255',
            'cantidad'=>'required',
            'imagen'=>'mimes:jpeg,bmp,png',
            'ubicacion'=>'required|max:45',
        ];
    }
}
