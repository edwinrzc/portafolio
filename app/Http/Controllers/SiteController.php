<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Servicio;
use App\Portafolio;
use App\EquipoTrabajo;

class SiteController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
        $this->middleware('verifica.role',['except'=>['index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banner = Banner::where('status', '=', '1')->firstOrFail();
        $servicios = Servicio::where('status','=','1')->get();
        $portafolios = Portafolio::where('status','=','1')->get();
        $equipo = EquipoTrabajo::all(); 
        return view('site.index2',compact('banner','servicios','portafolios','equipo'));
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function admin()
    {
        //
        if(auth()->check())
        {
            return view('site.index');
        }
        
        return redirect()->back();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vista()
    {
        //
        return view('site.index');
    }

    
}
