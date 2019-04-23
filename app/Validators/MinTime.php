<?php


namespace Validators;


class MinTime implements Validator
{
    private $min;
    private $delay;

    public function __construct($min, $delay = 0)
    {
        $this->min = $min;
        $this->delay = $delay;
    }


    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return strtotime($value) >= (strtotime($this->min) + $this->delay);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field must be the $this->min or later";
    }
}