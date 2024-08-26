<?php

require_once 'de.php';


function getImageList(string $dir_images, bool $sorted = true): array {

    $fileList = [];

    if (is_dir($dir_images)){
        if ($handle = opendir($dir_images)) {
            while (($file = readdir($handle)) !== false) {
                if ($file === '.' || $file === '..') {
                }else{
                    $fileList[] = $file;
                }
            }
            closedir($handle);
        }
    }

    if($sorted === true){
        sort($fileList);
    }

    return $fileList;
}

function uploadThumbnail($fromFile, $toFile = null, $maxDimensions = 300, $imgQuality = 80) {

    // Set a maximum height and width
    $width = $maxDimensions;
    $height = $maxDimensions;

    // Get new dimensions
    list($width_orig, $height_orig) = getimagesize($fromFile);

    // valid image?
    if($width_orig === NULL || $height_orig === NULL) {
        return false;
    }

    // valid size?
    if($width_orig > 20000 || $height_orig > 20000) {
        return false;
    }

    $ratio_orig = $width_orig/$height_orig;

    if ($width/$height > $ratio_orig) {
        (int) $width = $height*$ratio_orig;
    } else {
        (int) $height = $width/$ratio_orig;
    }

    // Resample
    $image_p = imagecreatetruecolor($width, $height);
    $image = @imagecreatefromjpeg($fromFile);

    if($image === FALSE) {
        return false;
    }

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

    // Output
    //if(@!imagejpeg($image_p, $toFile, $imgQuality)) return false;
    try{
        imagejpeg($image_p, $toFile, $imgQuality);
    }
    catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }

    imagedestroy($image_p);
    imagedestroy($image);

    return true;
}


function uploadImage(string $imgPath, string $pathToFile): bool {

    if (move_uploaded_file($imgPath, $pathToFile)) {
        return true;
    } else {
        return false;
    }
    
}
    