<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RolesRequest;
use App\Role;
use App\Http\Requests\UpdateRoleRequest;
use App\Item;

class RoleController extends Controller
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
        //
        $roles = Role::with(['users','items'])->get();
        return view('roles.index', compact('roles') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        //        
        $role = \App\Role::create( $request->all() );
        //dd($request);
        //auth()->user()->messages()->save($message);
        return redirect()->route('roles.index')->with('info','Tu mensaje ha sido recibido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::findOrFail($id);
        
        return view('roles.edit', compact('role'));
    }
    
    /**
     * Config role permited
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assigned($id)
    {
        //
        $role = Role::findOrFail($id);
        $items = Item::all();
        return view('roles.assigned', compact('role','items'));
    }
    
    /**
     * Config role permited
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, $id)
    {
        //
        /*$role = Role::findOrFail($id);
        $items = Item::all();
        return view('roles.assigned', compact('role','items'));*/
        
        $role = Role::findOrFail($id);
        $role->items()->sync($request->item);
        //redirect()-route('mensajes.index');
        return redirect()->route('roles.index');
    }
    
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        //
        $message = Role::findOrFail($id)->update( $request->all() );
        //redirect()-route('mensajes.index');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        
        $role->items()->detach();
        //dd($role->items()->detach($role));
        $role->delete();
        
        return redirect()->route('roles.index');
    }
}
