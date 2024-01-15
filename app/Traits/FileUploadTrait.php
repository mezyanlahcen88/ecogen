<?php
namespace App\Traits;

trait FileUploadTrait
{
    //public function FileUpload($request, $object, 'logo', 'images/transportcompanies',aliexpresse)
    //public function FileUpload($request, $object, 'favorite_icones', 'images/transportcompanies',aliexpresse)
    public function FileUpload($request, $object, $fillableAttribute, $directory,$name)
    {
            $file = $request->file($fillableAttribute);
            $extension = $file->getClientOriginalExtension();
            $newFileName = time() . '-' . $name . '-' . $fillableAttribute . '.' . $extension;
            $file->storeAs('public/' . $directory, $newFileName);
            $object->$fillableAttribute = $newFileName;
    }


    // function pour boucler sur les attributs d'un model et leurs attribués les valeurs de request correspodant
    // public function AttributeRequestObject($request, $object)
    // {
    //     foreach ($object->getFillable() as $fillableAttribute) {
    //         $object->$fillableAttribute = $request->$fillableAttribute;
    //     }
    //     return $object;
    // }

    // function pour boucler sur les attributs de type file d'un model et leurs attribués les valeurs de request correspodant

    // public function AttributeRequestFileObject($request, $object,$directory)
    // {
    //     foreach ($object->getFilefillable() as $fillableAttribute ) {
    //         if ($request->hasFile($fillableAttribute)) {
    //                 $file = $request->file($fillableAttribute);
    //                 $extension = $file->getClientOriginalExtension();
    //                 $fileName = time() . '-' . $fillableAttribute . '.' . $extension;
    //                 $file->storeAs('public/'.$directory, $fileName);
    //                 $object->$fillableAttribute = $fileName;
    //         }
    //     }
    //     return $object;
    // }


}
