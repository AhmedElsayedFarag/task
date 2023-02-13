<?php
namespace App\Traits;
use Imagick;
trait saveImageTrait {
    public function saveImage($value,$directory){
        $file = $value;
//        $extension = $file->clientExtension(); // getting image extension
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename =time().mt_rand(1000,9999).'.'.$extension;
        $file->move(public_path("img/$directory/"), $filename);
        return "img/$directory/".$filename;
    }
}
