<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class PantallasFormRequest extends Request
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
            'cantidad'=>'required',
            'imagen'=>'mimes:jpeg,bmp,png',
            'ubicacion'=>'max:95',
        ];
    }
}
