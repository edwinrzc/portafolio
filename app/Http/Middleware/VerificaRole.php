<?php

namespace App\Http\Middleware;

use Closure;
use App\Item;
use App\Role;
use Illuminate\Support\Facades\Route; 
use App\LogAction;
use Illuminate\Http\Request;

class VerificaRole
{
    
    private $items;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(request $request, Closure $next,$except = null)
    {
        $this->items = self::items();
        //dd('aquiii');
        $roteAction = Route::getCurrentRoute()->getName();
        
        $action = $this->setRoute($roteAction);
        
        $rolePermited = Role::getRolePermitedForAction( $action );
        
        //dd( auth()->user()->validRolesUser( $rolePermited ) );isSuperAdmin()
        //auth()->user()->isSuperAdmin() 
        if( 
            auth()->user()->isSuperAdmin() or 
            $roteAction === "index" or 
            auth()->user()->validRolesUser( $rolePermited )
         )
        {
            return $next($request);
        }
        
        //$oLog = new LogAction;        
        //$oLog->setLog( 0, $request->all() );
        
        self::log(0, $request->all());
        
        
        return redirect('/');
        
    }
    
    
    
    public function setRoute( $routeAction )
    {
        $action = $this->items->searchAction( $routeAction );
        
        if( count($action) == 0 )
        {
            $action = $this->items->setItemAction( $routeAction );
        }
        
        return $action;
    }
    
    
    
    public static function log($state,$request)
    {
        return (new LogAction)->setLog($state, $request);
    }
    
    
    public static function items()
    {
        return new Item;
    }
    
    
}
