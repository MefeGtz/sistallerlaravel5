<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class FlybacksFormRequest extends Request
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
            'nomenclatura'=>'max:60',
            'descripcion'=>'required|max:80',
            'foto'=>'mimes:jpeg,bmp,png',
            'foto2'=>'mimes:jpeg,bmp,png',
            'foto3'=>'mimes:jpeg,bmp,png',
            'ubicacion'=>'required|max:60',  
        ];
    }
}
