<?php

namespace App\Forms\FieldsType;

class ImageField extends AbstractField {

    private ?string $type = 'file';
    private ?string $imageFolder = '';


    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }


     /**
     * Get the value of class form image
     */
    public function getImageFolder()
    {
        return $this->imageFolder;
    }

    /**
     * Set the value of class form image
     *
     * @return  self
     */
    public function setImageFolder($imageFolder)
    {
        $this->imageFolder = $imageFolder;

        return $this;
    }
}
