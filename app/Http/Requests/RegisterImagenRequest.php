<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Portafolio;
use Illuminate\Http\JsonResponse;
use App\PortafolioImagen;

class RegisterImagenRequest extends FormRequest
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
            'file'=>'required',
        ];
    }
    
    
    public function register( Portafolio $portafolio, JsonResponse $json )
    {        
        
        $data = $json->getData();
        
        $imagen = new PortafolioImagen;
        $imagen->create([
            'directorio' => $data->path,
            'nombre' => $data->name,
            'tipo' => $data->mime_type,
            'portafolio_id' => $portafolio->id
        ]);
    }
}
