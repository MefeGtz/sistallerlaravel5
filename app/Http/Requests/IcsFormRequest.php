<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class IcsFormRequest extends Request
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
            'nomenclatura'=>'required|max:60',
            'descripcion'=>'max:205',
            'cantidad'=>'required',
            'contenedor'=>'max:45',
        ];
    }
}
