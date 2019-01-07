<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeudasImportacionRequest;
use App\Jobs\ImportDeudas;

class ImportacionDeudaController extends Controller
{
    //
    
    /**
     * Vista principal de importacion de deudas 
     * */
    public function index()
    {
        //
        //$import = 
        return view('importacion.index');
    }
    
    
    /**
     * Formulario para la importacion de deudas
     * */
    public function formUpload()
    {
        //
        return view('importacion.form');
    }
    
    
    /**
     * Metodo para la carga masiva de deudas
     * */
    public function upload(DeudasImportacionRequest $request )
    {
        //
        //dd($request->all());
        
        dispatch( 
            new ImportDeudas( $request->file('filecsv')->path() ) 
        );
        
        return redirect()->route('importacion.index');
    }
    
    
}
