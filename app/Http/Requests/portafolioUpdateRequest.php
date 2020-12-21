<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class portafolioUpdateRequest extends FormRequest
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
            'imagen' => 'image',
            'titulo' => 'required',
            'categoria' => 'required',
            'cliente' => 'required',
            'sitio' => 'required',
            'descripcion'=>'required',
            'status'=>'integer'
        ];
    }
}
