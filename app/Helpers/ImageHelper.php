<?php

use Illuminate\Support\Facades\Storage;

/**
 * Fonction pour réccupérer le logo par défaut
 */
if (!function_exists('getDefaultLogo')) {
    function getDefaultLogo(string $img) {
        if (!Storage::exists('storage/images/settings/'.$img)) {
            return '/storage/images/settings/'.$img;
        }
        return '/storage/images/defaults/logo.png';
    }
}


/**
 * Fonction pour réccupérer l'image de l'utilisateur
 */
if (!function_exists('getUserPicture')) {
    function getUserPicture(string $img = null) {

        if ($img && Storage::disk('public')->exists('images/users/'.$img)) {
            return '/storage/images/users/'.$img;
        }
        return '/assets/images/users/user-dummy-img.jpg';
    }
}

/**
 * Get the URL of a picture file based on its name and folder.
 *
 * @param string|null $img The name of the image file.
 * @param string $folder The folder path within the 'images/' directory.
 * @return string The URL of the picture file or a default image URL if the file doesn't exist.
 */

if (!function_exists('getPicture')) {
    function getPicture(string $img = null,string $folder) {

        if ($img && Storage::disk('public')->exists('images/'.$folder.'/'.$img)) {
            return '/storage/images/'.$folder.'/'.$img;
        }
        return '/assets/images/no_image.jpg';
    }
}

/**
 * Store or update a picture file  of the specified object.
 *
 * @param Illuminate\Http\Request $request The HTTP request containing the uploaded file.
 * @param object $object The object to update with the picture property.
 * @param string $FileName The name of the file input field in the request.
 * @param string $concatName The concatenated name for the new image file.
 * @param string $folder The folder path within the 'public/images/' directory to store the picture.
 * @return void
 */

if (!function_exists('dealWithPicture')) {
    function dealWithPicture($request , $object,string $fileName,string $concatName, string $folder, string $action) {
    $file = $request->file($fileName);
    $extension = $file->getClientOriginalExtension();
    $newImageName = time() . '-' . $concatName . '.' . $extension;
    $file->storeAs('public/images/'.$folder, $newImageName);
    if($action == 'update'){
        if ($object->$fileName) {
            Storage::delete('public/images/'.$folder.'/' . $object->$fileName);
        }
    }
    $object->picture = $newImageName;
    }

}

/**
 * delete  picture file  of the specified object on force delete.
 *
 * @param object $object The object to update with the picture property.
 * @param string $FileName The name of the file input field in the request.
 * @param string $folder The folder path within the 'public/images/' directory to store the picture.
 * @return void
 */
if (!function_exists('deletePicture')) {
    function deletePicture($object ,string $folder,string $fileName) {
        if ($object->$fileName) {
            Storage::delete('public/images/'.$folder.'/' . $object->$fileName);
        }

    }
}


