<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AwsImageUpload extends Controller
{
    //aws 버킷 이미지 업로드
    public function setImageUpload($getImage, $s3folder, $user_folder) {
       
        $image = $getImage; //$request->file('image');
        $filename = $image->getClientOriginalName();
        $height = Image::make($image)->height();
        $width = Image::make($image)->width();

        $image_resize = Image::make($image->getRealPath());
        $extension = $getImage->getClientOriginalExtension();

        if ($height > 400 && $width > 400)
            $image = $image_resize->resize(400, 400)->encode($extension);
        else if ( $height > 400) 
            $image = $image_resize->resize($width, 400)->encode($extension);
        else if (  $width  > 400 )
            $image = $image_resize->resize(400,  $height)->encode($extension);
        else
            $image = $image_resize->encode($extension);
        
        $filenamewithextension = $getImage->getClientOriginalName();

        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
        $extension = $getImage->getClientOriginalExtension();
        
        $filenametostore = $s3folder.'/'.$user_folder.'/'.$filename.'_'.time().'.'.$extension;
        //$filenametostore = $s3folder.'/'.$filename.'_'.time().'.'.$extension;
        
        Storage::disk('s3')->put($filenametostore, (string)$image, 'public');
        
        $url = Storage::disk('s3')->url($s3folder.'/'.$user_folder.'/'.$filename.'_'.time().'.'.$extension);
        
        return $url;
       
        
        
    }
    public function imageResize($file){
        $image = $file; 
        $filename = $image->getClientOriginalName();
        $height = Image::make($image)->height();
        $width = Image::make($image)->width();

        $image_resize = Image::make($image->getRealPath());
        $extension = $getImage->getClientOriginalExtension();

        if ($height > 400 && $width > 400)
            return $image = $image_resize->resize(400, 400)->encode($extension);
        else if ( $height > 400) 
            return $image = $image_resize->resize($width, 400)->encode($extension);
        else if (  $width  > 400 )
            return $image = $image_resize->resize(400,  $height)->encode($extension);
        else
            return $image = $image_resize->encode($extension);
    }
}
