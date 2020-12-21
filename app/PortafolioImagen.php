<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortafolioImagen extends Model
{
    
    
    protected $table = "portafolio_imagenes";
    
    
    protected $fillable = ['nombre','directorio','tipo','portafolio_id'];
    
    
    
    public function portafolio()
    {
        return $this->hasOne(Portafolio::class);
    }
    
    
    public function imagen()
    {
        return $this->directorio.$this->nombre;
    }
    
    
}
