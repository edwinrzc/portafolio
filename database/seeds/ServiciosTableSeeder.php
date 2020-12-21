<?php

use Illuminate\Database\Seeder;
use App\Servicio;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Servicio::truncate();
        
        $servicio = Servicio::create([
            'titulo'=> 'Diseño Web',
            'imagencode'=> 'fa-lightbulb-o',
            'descripcion'=> 'Diseño web',
            'imagen'=> '',
            'status'=> 1,
        ]);
        
        $servicio = Servicio::create([
            'titulo'=> 'Desarrollo de Sistema',
            'imagencode'=> 'fa-cogs',
            'descripcion'=> 'Desarrollo de aplicaciones',
            'imagen'=> '',
            'status'=> 1,
        ]);
        
    }
}
