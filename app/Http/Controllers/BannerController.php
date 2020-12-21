<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\bannerRequest;
use App\Banner;
use App\LogAction;
use App\Http\Requests\bannerUpdateRequest;
use Illuminate\Support\Facades\File;
use App\ClassImagen;

class BannerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verifica.role');
    }
    
    
    //
    
    /***
     * Vista principal
     * */
    public function index()
    {
        $banners = Banner::all();
        return view('banner.index',compact('banners'));
    }
    
    
    public function create(Request $request)
    {
        return view('banner.form');
    }
    
    
    public function store(bannerRequest $request)
    {
        $banner = Banner::create( $request->all() );
        
        $md5Name = md5_file($request->file('imagen')->getRealPath());
        $guessExtension = $request->file('imagen')->guessExtension();
        $banner->imagen = $request->file('imagen')->storeAs('/banner', $md5Name.'.'.$guessExtension  ,'public');
        $banner->save();
        
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('banner.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.view', compact('banner'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function crop($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.crop', compact('banner'));
    }
    
    /**
     * Update the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.edit', compact('banner'));
    }
    
    
    
    /**
     * Update
     * */
    public function update( bannerUpdateRequest $request, $id )
    {
        $banner = Banner::findOrFail($id);
        $oldImagen = $banner->imagen;
        $banner->update( $request->all() );
        if($request->hasFile('imagen'))
        {
            
            //$path = Storage::url('public');
            $pathImagen = "/storage/".$oldImagen;
            
            if( File::exists( public_path($pathImagen) ))
            {
                File::delete( public_path($pathImagen) );                
                
                $pathImagenNew = "/storage/".str_replace('banner/', 'banner/crop_', $oldImagen);
                if( File::exists( public_path($pathImagenNew) ))
                {
                    File::delete( public_path($pathImagenNew) );
                }
            }
            
            $md5Name = md5_file($request->file('imagen')->getRealPath());
            $guessExtension = $request->file('imagen')->guessExtension();
            $banner->imagen = $request->file('imagen')->storeAs('/banner', $md5Name.'.'.$guessExtension  ,'public');
        }
        
        $banner->save();        
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('banner.index');
    }
    
    
    
    /**
     * Update
     * */
    public function cropStore( Request $request, $id )
    {
        $banner = Banner::findOrFail($id);
        $oldImagen = $banner->imagen;
        
        if( $request->has('width') && $request->has('height') )
        {
            ClassImagen::saveCrop($request, 'banner', $oldImagen);            
            
        }
        
        return redirect()->route('banner.index');
    }
    
}
