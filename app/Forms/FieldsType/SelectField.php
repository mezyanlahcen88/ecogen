<?php

namespace App\Forms\FieldsType;

class SelectField extends AbstractField {

    private array $options = [];
    private ?array $reload = [];
    private bool $isMultiple = false;
    private ?string $type = 'select';

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
     * Get the value of options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return  self
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }


    /**
     * Get the value of reload
     */
    public function getReload()
    {
        return $this->reload;
    }

    /**
     * Set the value of optionSelected
     *
     * @return  self
     */
    public function setReload($reload)
    {
        $this->reload = $reload;

        return $this;
    }


    /**
     * Get the value of isMultiple
     */
    public function getIsMultiple()
    {
        return $this->isMultiple;
    }

    /**
     * Set the value of isMultiple
     *
     * @return  self
     */
    public function setIsMultiple($isMultiple)
    {
        $this->isMultiple = $isMultiple;

        return $this;
    }
}
