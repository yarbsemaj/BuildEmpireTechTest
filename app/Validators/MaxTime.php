<?php


namespace Validators;


class MaxTime implements Validator
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
        return (strtotime($value) + $this->delay) <= strtotime($this->max);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field must be the $this->max or earlier";
    }
}