<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class LogAction extends Model
{
    //
    
    
    protected $fillable = ['route','method','user_id','state','request'];
    
    
    
    
    public function users()
    {
        return $this->belongsTo(User::class,"user_id","id");
        
        
    }
    
    
    
    public function setLog( $state, $request )
    {
        $aRoute = Route::getCurrentRoute();
        
        $this->route = $aRoute->getName();
        $this->method = $aRoute->methods[0];
        $this->user_id = auth()->user()->id;
        $this->state = $state;
        $this->request = json_encode($request);
        $this->ip_address = Request::ip();
        
        $this->save();        
    }
    
    
    public function getStateLog()
    {
        $log = "";
        switch ($this->state)
        {
            case 1:
                $log = "Creado";
            break;
            case 2:
                $log = "Actualizado";
            break;
            case 3:
                $log = "Eliminado";
            break;
            default:
                $log = "Rechazado";
        }
        
        
        return $log;
    }
    
    
    
}
