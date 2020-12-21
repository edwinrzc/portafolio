<?php

namespace App\Http\Controllers;

use App\EquipoTrabajo;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEquipoTrabajoRequest;
use App\Http\Requests\UpdateEquipoTrabajoRequest;
use Illuminate\Support\Facades\Storage;

class EquipoTrabajoController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verifica.role');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Administrador Equipo de Trabajo";
        $equipos = EquipoTrabajo::all();
        return view('equipotrabajo.index', compact('equipos','title') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Formulario Miembro de Trabajo";
        return view('equipotrabajo.form', compact('title') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEquipoTrabajoRequest $request)
    {
        $request->createEquipo();        
        
        return redirect()->route('equipotrabajo.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipoTrabajo  $equipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $title = "Formulario Miembro de Trabajo";
        $equipo = EquipoTrabajo::findOrFail($id);
        return view('equipotrabajo.edit', compact('equipo','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipoTrabajo  $equipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipoTrabajoRequest $request, $id)
    {
        $equipo = EquipoTrabajo::findOrFail($id);
        $request->update($equipo);       
        
        return redirect()->route('equipotrabajo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipoTrabajo  $equipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = EquipoTrabajo::findOrFail($id);
        
        if( Storage::get($image->foto()) )
        {
            Storage::delete($image->foto());
            
        }
        
        $image->delete();
    }
}
