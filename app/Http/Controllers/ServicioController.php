<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Http\Requests\servicioRequest;
use App\LogAction;
use App\Http\Requests\servicioUpdateRequest;
use Illuminate\Support\Facades\File;

class ServicioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verifica.role');
    }
    
    
    
    //
    
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicio.index', compact('servicios') );
    }
    
    
    public function create(Request $request)
    {
        $title = "Formulario Servicios";
        return view('servicio.form', compact('title') );
    }
    
    
    public function store(servicioRequest $request)
    {
        $banner = Servicio::create( $request->all() );
        
        if( $request->hasFile('imagen') )
        {
            $md5Name = md5_file($request->file('imagen')->getRealPath());
            $guessExtension = $request->file('imagen')->guessExtension();
            $banner->imagen = $request->file('imagen')->storeAs('/servicio', $md5Name.'.'.$guessExtension  ,'public');
        }
        
        $banner->save();
        
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('servicio.index');
    }
    
    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Formulario Servicios";
        $servicio = Servicio::findOrFail($id);
        return view('servicio.edit', compact('servicio','title'));
    }
    
    
    
    /**
     * Update
     * */
    public function update( servicioUpdateRequest $request, $id )
    {
        $servicio = Servicio::findOrFail($id);
        $oldImagen = $servicio->imagen;
        $servicio->update( $request->all() );
        
        if($request->hasFile('imagen'))
        {
            
            //$path = Storage::url('public');
            $pathImagen = "/storage/".$oldImagen;
            
            if( File::exists( public_path($pathImagen) ))
            {
                File::delete( public_path($pathImagen) );
            }
            
            $md5Name = md5_file($request->file('imagen')->getRealPath());
            $guessExtension = $request->file('imagen')->guessExtension();
            $servicio->imagen = $request->file('imagen')->storeAs('/servicio', $md5Name.'.'.$guessExtension  ,'public');
        }
        
        $servicio->save();
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('servicio.index');
    }
    
    
}
