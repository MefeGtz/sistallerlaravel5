<?php

namespace sistallerl5\Http\Requests;

use sistallerl5\Http\Requests\Request;

class FallasFormRequest extends Request
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
            'titulo'=>'max:65',
            'aparato'=>'max:65',
            'marca'=>'max:65',
            'modelo'=>'max:65',
            'descripcion'=>'required|max:250',
            'foto'=>'mimes:jpeg,bmp,png',
            'foto2'=>'mimes:jpeg,bmp,png',  
        ];
    }
}
