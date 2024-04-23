<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class PlacasFormRequest extends Request
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
            'marca'=>'required|max:45',
            'modelo'=>'required|max:45',
            'descripcion'=>'max:205',
            'foto'=>'mimes:jpeg,bmp,png',
            'foto2'=>'mimes:jpeg,bmp,png',
            
        ];
    }
}
