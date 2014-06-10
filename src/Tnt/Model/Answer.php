<?php

namespace Tnt\Model;

class Answer
{
    /** @var  string */
    private $value;
    /** @var  string */
    private $label;

    public function __construct($value, $label)
    {

        $this->value = $value;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

}
