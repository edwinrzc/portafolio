<?php

namespace App\Http\Middleware;

use Closure;
use App\Item;
use App\Role;
use Illuminate\Support\Facades\Route; 
use App\LogAction;
use Illuminate\Support\Facades\Request;

class VerificaRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$except = null)
    {
        $items = new Item;
        //dd( $except );
        $roteAction = Route::getCurrentRoute()->getName();
        $action = $items->searchAction( $roteAction );
        
        
        if( count($action) <= 0 )
        {
            $action = $items->setItemAction( $roteAction );
        }
        
        $rolePermited = Role::getRolePermitedForAction( $action );
        //dd( auth()->user()->validRolesUser( $rolePermited ) );isSuperAdmin()
        //auth()->user()->isSuperAdmin() 
        if( auth()->user()->isSuperAdmin() or $roteAction === "index" or auth()->user()->validRolesUser( $rolePermited ))
        {
            return $next($request);
        }
        
        $oLog = new LogAction;        
        $oLog->setLog( 0, $request->all() );
        
        
        return redirect('/');
        
    }
    
    
}
