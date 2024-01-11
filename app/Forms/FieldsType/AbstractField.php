<?php

namespace App\Forms\FieldsType;
/**
 * CLASS CONTAIN ALL SHARED FIELDS PARAMETERS
 */
abstract class AbstractField {

    private string $key;
    private ?string $label;
    private ?string $id='';
    private ?bool $required = false;
    private ?string $class = 'col-md-12';
    private ?string $fieldClass = 'form-control';
    private ?string $placeholder = '';
    private ?string $value = '';

    /**
     * Get the value of key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return  self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of required
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set the value of required
     *
     * @return  self
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get the value of class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of formClass
     */
    public function getFieldClass()
    {
        return $this->fieldClass;
    }

    /**
     * Set the value of formClass
     *
     * @return  self
     */
    public function setFieldClass($fieldClass)
    {
        $this->fieldClass = $fieldClass;

        return $this;
    }

    /**
     * Get the value of placeholder
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * Set the value of placeholder
     *
     * @return  self
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

}
