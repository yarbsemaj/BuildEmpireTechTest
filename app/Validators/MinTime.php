<?php


namespace Validators;


class MinTime implements Validator
{
    private $max;
    private $delay;

    public function __construct($max, $delay = 0)
    {
        $this->max = $max;
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
        return strtotime($value) >= strtotime($this->min) + $this->delay;
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field must be greater than $this->min";
    }
}