<?php

namespace App\Forms\FieldsType;

class CheckboxField extends AbstractField {

    private ?string $type = 'checkbox';

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
}
