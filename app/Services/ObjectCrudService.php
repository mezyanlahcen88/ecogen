<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Service des settings
 */
class ObjectCrudService
{

    private FileService $fileService;

    public function __construct(FileService $fileService){
        $this->fileService = $fileService;
    }

    /**
     * Generic Method To Validate a Request from Rules
     *
     * @param Request $request
     * @param array $rules
     * @return object
     */
    public function AttributeRequestValidation(Request $request, array $rules): array
    {
        return $request->validate($rules);
    }


    // function pour boucler sur les attributs d'un model et leurs attribués les valeurs de request correspodant
    public function AttributeRequestObject(Request $request, mixed $object, $rules): mixed
    {
        // $request->validate($rules);

        foreach ($object->getFillable() as $fillableAttribute) {
            $object->$fillableAttribute = $request->$fillableAttribute;
        }
        return $object;
    }

    // function pour boucler sur les attributs de type file d'un model et leurs attribués les valeurs de request correspodant

    public function AttributeRequestFileObject(Request $request, mixed $object,$directory, $rules): mixed
    {

        foreach ($object->getFilefillable() as $fillableAttribute ) {
            if ($request->hasFile($fillableAttribute)) {
                    $file = $request->file($fillableAttribute);
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '-' . $fillableAttribute . '.' . $extension;
                    $file->storeAs('public/'.$directory, $fileName);
                    $object->$fillableAttribute = $fileName;
            }
        }
        return $object;
    }

    // function pour boucler sur les attributs d'un model et leurs attribués les valeurs de request correspodant
    public function AttributeRequestWithFileObject(Request $request, mixed $object, String $className, String $directory, array $rules): mixed
    {
        // dd($rules);
        $request->validate($rules);

        $attributeFields = $this->AttributeRequestObject($request, $object, $rules);
        $attributeFileFields =$this->AttributeRequestFileObject($request, $object, $directory, $rules);
        //pour Fusionner les deux array dans un seul object
        $object = (object) array_merge((array) $attributeFields, (array) $attributeFileFields);

       return $this->cast($object,$className);

    }


    public function cast($instance, $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            \strlen($className),
            $className,
            strstr(strstr(serialize($instance), '"'), ':')
        ));
    }

}
