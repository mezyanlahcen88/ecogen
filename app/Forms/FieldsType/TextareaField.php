<?php

namespace App\Forms\FieldsType;

class TextareaField extends AbstractField {

    private ?string $cols = '50';
    private ?string $type = 'textarea';
    private ?string $rows = '4';

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
     * Get the value of rows
     */
     public function getRows()
    {
        return $this->rows;
    }

    /**
     * Set the value of rows
     *
     * @return  self
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
        return $this;
    }


    /**
     * Get the value of cols
     */
      public function getCols()
    {
        return $this->cols;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setCols($cols)
    {
        $this->cols = $cols;
        return $this;
    }
}
