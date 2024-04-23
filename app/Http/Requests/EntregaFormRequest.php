<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class EntregaFormRequest extends Request
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
            'cobro'=>'max:30',
            'f_entrega'=>'',
            'estado'=>'max:45',
            'condicion'=>'max:5',
        ];
    }
}
