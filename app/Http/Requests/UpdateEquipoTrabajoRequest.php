<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use App\EquipoTrabajo;
use App\LogAction;

class UpdateEquipoTrabajoRequest extends FormRequest
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
            'nombre'=>'required|min:4',
            'apellido'=>'required|min:4',
            'cargo'=>'required',
            'twitter' => 'nullable|present|url',
            'facebook'=>'nullable|present|url',
            'linkedin'=>'nullable|present|url',
        ];
    }
    
    
    public function update(EquipoTrabajo $equipo)
    {
        
        $data = $this->validated();
        $request = request();
        
        $equipo->update([
            'nombre'          =>$data['nombre'] ?? null,
            'apellido'         =>$data['apellido'] ?? null,
            'cargo'      =>$data['cargo'] ?? null,
            'twitter'      =>$data['twitter'] ?? null,
            'linkedin'      =>$data['linkedin'] ?? null,
            'facebook'      =>$data['facebook'] ?? null,
        ]);
        
        $oldImagen = $equipo->foto;
        
        if($request->hasFile('foto'))
        {
            
            //$path = Storage::url('public');
            $pathImagen = "/storage/".$oldImagen;
            
            if( File::exists( public_path($pathImagen) ))
            {
                File::delete( public_path($pathImagen) );
            }
            
            $md5Name = uniqid(rand(), true).md5_file($request->file('foto')->getRealPath());
            $guessExtension = $request->file('foto')->guessExtension();
            $equipo->foto = $request->file('foto')->storeAs('/equipotrabajo', $md5Name.'.'.$guessExtension  ,'public');
        }
        
        $equipo->save();
        $oLog = new LogAction;
        $oLog->setLog( 2, $request->all() );
        
        return redirect()->route('equipotrabajo.index');
    }
}
