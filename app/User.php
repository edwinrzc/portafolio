<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;
    
    
    private $superAdmin = "edwinrzc@gmail.com";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','email', 'password','state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    
    public function setPasswordAttribute( $password )
    {
        $this->attributes['password'] = bcrypt( $password ); 
    }
    
    
    
    public function getFullName()
    {
        return $this->name." ".$this->lastname;
    }
    
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }
    
    
    public function validRolesUser( Collection $aRole )
    {
        //dd($this->roles->pluck('id', 'name'));
        return (bool)$this->roles->pluck('name')->intersect($aRole)->count();
    }
    
    
    public function onlyPermited( Collection $role )
    {
        return (bool)$this->roles->pluck('name')->intersect($role)->count();
    }
    
    
    public function isSuperAdmin()
    {
        return $this->email === $this->superAdmin;
    }
    
    
}
