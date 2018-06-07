<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.03.2018
 * Time: 11:13
 */

namespace App\controller;


class ImageController
{

    public function imageresize($image, $path, $imageName, $file_ext)
    {
        $size = GetImageSize($image);
        $old_width = $size[0];
        $old_height = $size[1];
        if($file_ext == 'jpg' or $file_ext == 'jpeg') {
            $image = imagecreatefromjpeg($image);
        }elseif ($file_ext == 'phg')
        {
            $image = imagecreatefrompng($image);
        }else{
            $image = imagecreatefromgif($image);
        }
        $new_height=240;
        $new_width = 320;
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
        if($file_ext == 'jpg' or $file_ext == 'jpeg') {
            imagejpeg($new_image, $path . '/' . $imageName . '.jpg');
        }elseif ($file_ext == 'phg') {
            imagegif($new_image, $path . '/' . $imageName . '.gif');
        }else {
            imagepng($new_image, $path . '/' . $imageName . '.gif');
        }
    }
}