<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoTrabajo extends Model
{
    
    
    protected $fillable = ['nombre','apellido','cargo','twitter','linkedin','facebook'];
    
    
    
    public function fullname()
    {
        return $this->nombre.' '.$this->apellido;
    }
}
