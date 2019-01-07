<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ItemsRequest;
use App\Item;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
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
        $items = \App\Item::all();
        return view('items.index', compact('items') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('items.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemsRequest $request)
    {
        //
        
        $item = \App\Item::create( $request->all() );
        //dd($request);
        //auth()->user()->messages()->save($message);
        return redirect()->route('items.index')->with('info','Tu mensaje ha sido recibido');
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
        $item = Item::findOrFail($id);
        
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $id)
    {
        //
        $item = Item::findOrFail($id)->update( $request->all() );
        //redirect()-route('mensajes.index');
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        
        $item->roles()->detach();
        //dd($role->items()->detach($role));
        $item->delete();
        
        return redirect()->route('items.index');
    }
}
