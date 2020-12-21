<?php
namespace App;

use Illuminate\Support\Facades\File;

class ClassImagen
{
    
    public static function saveCrop( $request, $direction, $oldImagen )
    {
        
        
        try
        {
            $pathImagen = "/storage/".$oldImagen;
            $pathImagenNew = "/storage/".str_replace($direction.'/', $direction.'/crop_', $oldImagen);
            
            if( File::exists( public_path($pathImagenNew) ))
            {
                File::delete( public_path($pathImagenNew) );
            }
            
            list($ancho, $alto, $tipo, $atributos) = getimagesize(public_path($pathImagen));
            $x1      = $request->get('x1');
            $y1      = $request->get('y1');
            $width   = $request->get('width');
            $height  = $request->get('height');
            
            $srcImg  = imagecreatefromjpeg( public_path($pathImagen) );
            $newImg  = imagecreatetruecolor($width, $height);
            
            imagecopyresampled($newImg, $srcImg, 0, 0, $x1, $y1, $width, $height, $ancho, $alto);
            
            imagejpeg($newImg, public_path($pathImagenNew) );
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
        
    }
}

