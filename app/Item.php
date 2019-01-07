<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    
    public $timestamps = false;
    
    protected $fillable = ['item','description'];
    
    
    public function roles()
    {
        return $this->belongsToMany(Role::class,'items_roles');
    }
    
    
    
    public function searchAction( $action )
    {
        return $this->where('item', $action)->get();
    }
    
    
    public function setItemAction( $path )
    {
        $item = new Item;
        $item->item = $path;
        $item->description = "Permiso a la vista ".$path;
        $item->save();
        return $item;
    }
    
    
}
