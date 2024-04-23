<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class OtrosFormRequest extends Request
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
            'Tipo'=>'required|max:45',
            'nomenclatura'=>'max:45',
            'descripcion'=>'required|max:205',
            'cantidad'=>'required|max:80',
            'contenedor'=>'max:45',
            'foto'=>'mimes:jpeg,bmp,png',
        ];
    }
}
