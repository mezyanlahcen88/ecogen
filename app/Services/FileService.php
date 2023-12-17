<?php

namespace App\Services;

use App\Models\Setting;
use App\Enums\FileOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Service des settings
 */
class FileService {

    /**
     * Méthode générale pour l'enregistrement des fichiers
     *
     * @param [type] $file
     * @param [type] $path
     * @param [type] $prefix
     * @param [type] $existImage
     * @return string
     */
    public function storeFile($file, $path, $prefix, $existImage = null): string {
        $extension = $file->getClientOriginalExtension();
        $newImageName = $prefix . "-" . time() . "." . $extension;
        $file->storeAs($path, $newImageName);
        if ($existImage) {
            Storage::delete($path . $existImage);
        }
        return $newImageName;
    }
}