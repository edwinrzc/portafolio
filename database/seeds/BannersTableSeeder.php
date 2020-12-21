<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Banner::truncate();
        
        $banner = Banner::create([
            'titulo'=> 'If-Programming',
            'subtitulo'=> 'Programación y diseño',
            'tituloboton'=> 'Nuestros Servicios',
            'imagen'=> 'banner/32bebdc3b9dc3466553ecfdd4d40c408.jpeg',
            'status'=> 1,
        ]);
    }
}
