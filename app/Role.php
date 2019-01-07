<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Role extends Model
{
    //
    
    protected $fillable = ['type','name','description'];
    
    
    public function getType()
    {
        $result = "";
        
        switch ($this->type)
        {
            case 0:
                $result = "Role";
            break;
            default:
                $result = "Acción";
        }
        
        return $result;
        
    }
    
    
    
    public function items()
    {
        return $this->belongsToMany(Item::class,'items_roles');
    }
    
    
    
    public function users()
    {
        return $this->belongsToMany(User::class,'assigned_roles');
    }
    
    
    
    public function permiso($query, $keyword)
    {
        return $this->whereHas('items_roles', function ($query) use ($name){
            $query->where('name', $name);
        })->get();
    }
    
    
    public function scopeRoleItem(Builder $query, $id) {
        return $query->where('items_roles.item_id', '=', $id )
        ->join('items_roles', 'roles.id', '=', 'items_roles.role_id');
    }
    
    
    public static function getRolePermitedForAction( $rows )
    {
        
        $role = self::roleItem($rows[0]['id'])->get();
        return $role->pluck('name');
    }
    
    
}
