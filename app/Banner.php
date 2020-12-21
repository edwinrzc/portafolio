<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    
    protected $fillable = ['titulo','subtitulo','tituloboton','imagen','status'];
}
