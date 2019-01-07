<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordUserRequest;
use App\LogAction;

class UsersController extends Controller
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
        $users = User::with(['roles'])->get();
        return view('auth.index', compact('users') );
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function log()
    {
        //
        $logs = LogAction::with(['users'])->get();
        return view('auth.log', compact('logs') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('auth.create', compact('roles') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        
        $user = User::create( $request->all() );
        
        $user->roles()->attach( $request->roles );
        
        $oLog = new LogAction;
        $oLog->setLog( 1, $request->all() );
        
        return redirect()->route('usuarios.index');
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
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        //
        $user = auth()->user();
        //dd($user);
        
        return view('auth.profile', compact('user'));
    }
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepass()
    {
        //
        $user = auth()->user();
        $volver = "index";
        //dd($user);
        
        return view('auth.password', compact('user','volver'));
    }
    
    /**
     * Show the form for editing password user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassUser( $id )
    {
        //
        $user = User::findOrFail($id);
        $volver = "usuarios.index";
        
        return view('auth.password', compact('user','volver'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ChangePasswordUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(ChangePasswordUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        
        $user->update( $request->all() );
        
        $oLog = new LogAction;
        $oLog->setLog( 2, $request->all() );
        //redirect()-route('mensajes.index');
        return back()->with('status', 'El cambio de clave se realizo de manera exitosa!');;
        //return redirect()->route('usuarios.changepassword');
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
        $user = User::findOrFail($id);
        
        $roles = Role::all();
        
        return view('auth.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        
        $user->update( $request->all() );
        
        $user->roles()->sync($request->roles);
        
        $oLog = new LogAction;
        $oLog->setLog( 2, $request->all() );
        //redirect()-route('mensajes.index');
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->roles()->detach();
        //dd($role->items()->detach($role));
        $user->delete();        
        
        $oLog = new LogAction;
        $oLog->setLog( 3, $user );
        
        return redirect()->route('usuarios.index');
    }
}
