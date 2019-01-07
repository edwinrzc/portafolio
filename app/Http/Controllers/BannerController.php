<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\bannerRequest;
use App\Banner;
use App\LogAction;
use App\Http\Requests\bannerUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
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
    
}
