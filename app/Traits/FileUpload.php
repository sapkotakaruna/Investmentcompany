<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait FileUpload{
    public function checkDirectoryExist ($_folderPath){
        //check if exist image folder inn public path
        if (!file_exists(public_path('images')))
        {
            @mkdir(public_path('images'));
        }
        //check folder
        if (!file_exists(pubic_path($_folderPath)))
        {
            @mkdir(public_path($_folderPath));
        }

    }

    public function getRandomStringForImage()
    {
        return rand(2323,9999);
    }

    protected function processImage($file,$publicPathToUpload, $dimension_conf = null)
    {
        $this->file_name = time().'_'.$this->getRandomStringForImage().'.'. $file->getClientOriginalExtension();
        //check if folder exist
        $this->checkDirectoryExist($publicPathToUpload);

        $file->move(public_path($publicPathToUpload), $this->file_name);

        if($dimension_conf) {
            //   upload thumb images
            $image_thumb_config = $dimension_conf;
            foreach ($image_thumb_config as $thumb_config){

                $image = Image::make(public_path($publicPathToUpload).DIRECTORY_SEPARATOR.$this->file_name);
                $image-> resize($thumb_config['width'], $thumb_config['height']);
//                $image->resize($thumb_config['width'],$thumb_config['height'],function($constraint){
//                    $constraint->aspectRatio();
//                });
                $image->save(public_path($publicPathToUpload). DIRECTORY_SEPARATOR . $thumb_config['width'].'_'.$thumb_config['height'].'_'.$this->file_name);
            }
        }

    }

}
