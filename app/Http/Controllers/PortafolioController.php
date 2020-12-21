<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portafolio;
use App\Http\Requests\portafolioRequest;
use App\LogAction;
use Illuminate\Support\Facades\File;
use App\ClassImagen;
use App\Http\Requests\portafolioUpdateRequest;
use App\Http\ViewComposers\UploadComposer;
use App\Http\Requests\RegisterImagenRequest;
use App\PortafolioImagen;
use Illuminate\Support\Facades\Storage;

class PortafolioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verifica.role');
    }
    
    
    //
    
    public function index()
    {
        $title = "Administrador Portafolio";
        $portafolios = Portafolio::all();
        return view('portafolio.index', compact('portafolios','title') );
    }
    
    
    public function create(Request $request)
    {
        $title = "Formulario Portafolio";
        return view('portafolio.form', compact('title') );
    }
    
    
    public function store(portafolioRequest $request)
    {
        $portafolio = Portafolio::create( $request->all() );
        
        if( $request->hasFile('imagen') )
        {
            $md5Name = md5_file($request->file('imagen')->getRealPath());
            $guessExtension = $request->file('imagen')->guessExtension();
            $portafolio->imagen = $request->file('imagen')->storeAs('/portafolio', $md5Name.'.'.$guessExtension  ,'public');
        }
        
        $portafolio->save();
        
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('portafolio.index');
    }
    
    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Formulario Portafolio";
        $portafolio = Portafolio::findOrFail($id);
        return view('portafolio.edit', compact('portafolio','title'));
    }
    
    
    
    /**
     * Update
     * */
    public function update( portafolioUpdateRequest $request, $id )
    {
        $servicio = Portafolio::findOrFail($id);
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
            
            $md5Name = uniqid(rand(), true).md5_file($request->file('imagen')->getRealPath());
            $guessExtension = $request->file('imagen')->guessExtension();
            $servicio->imagen = $request->file('imagen')->storeAs('/portafolio', $md5Name.'.'.$guessExtension  ,'public');
        }
        
        $servicio->save();
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('portafolio.index');
    }
    
    
    
    /**
     * Update
     * */
    public function cropStore( Request $request, $id )
    {
        $portafolio = Portafolio::findOrFail($id);
        $oldImagen = $portafolio->imagen;
        
        if( $request->has('width') && $request->has('height') )
        {
            ClassImagen::saveCrop($request, 'portafolio', $oldImagen);
            
        }
        
        return redirect()->route('portafolio.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function crop($id)
    {
        $title = "Ajustar Imagen";
        $portafolio = Portafolio::findOrFail($id);
        return view('portafolio.crop', compact('portafolio','title'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galery($id)
    {
        $title = "Galeria de Imagen";
        //dd($id);
        $galerys = PortafolioImagen::where('portafolio_id',$id)->get();
        //dd($portafolio->imagenes());
        return view('portafolio.galery', compact('galerys','title','id'));
    }
    
    
    
    /**
     * Update
     * */
    public function uploadStore( RegisterImagenRequest $request, $id )
    {
        
        $upload = UploadComposer::start()->upload($request);
        
        $portafolio = Portafolio::findOrFail($id);
        
        $request->register($portafolio, $upload);
        
        
        
        /*$portafolio = Portafolio::findOrFail($id);
        $oldImagen = $portafolio->imagen;
        
        if( $request->has('width') && $request->has('height') )
        {
            ClassImagen::saveCrop($request, 'portafolio', $oldImagen);
            
        }
        
        return redirect()->route('portafolio.index');*/
        
        return $upload;
    }
    
    
    
    public function saveTitle( Request $request, $id )
    {
        $result = [];
        
        try {
            
            if($request->get('titulo'))
            {
                
                $image = PortafolioImagen::findOrFail($id);
                
                $image->titulo = $request->get('titulo');
                
                $image->save();
                
                $oLog = new LogAction;
                $oLog->setLog( 2, $request->all() );
                
                $result['error'] = false;
            }
            else
            {
                throw new \Exception('Se ha producido un error: Faltan argumentos.');
            }
            
        } catch (\Exception $e) {
            
            $result['error'] = true;
            $result['message'] = $e->getMessage();
            
        }
        
        
        return response()->json($result);
        
    }
    
    
    
    public function removeImage(Request $request, $id)
    {
        $result = [];
        
        try {
            
            $image = PortafolioImagen::findOrFail($id);
            
            if( Storage::get($image->imagen()) )
            {
                Storage::delete($image->imagen());
                
            }
            
            $image->delete();
            
            $oLog = new LogAction;
            $oLog->setLog( 3, $request->all() );
            
            $result['error'] = false;
            
            
        } catch (\Exception $e) {
            
            $result['error'] = true;
            $result['message'] = $e->getMessage();
            
        }
        
        
        return response()->json($result);
    }
    
    
}
