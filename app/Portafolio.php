<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    //
    
    protected $fillable = ['titulo','categoria','cliente','imagen','descripcion','sitio','status'];
    
    
    
    public function imagenes()
    {
        return $this->hasMany(PortafolioImagen::class);
    }
    
    
    
}
