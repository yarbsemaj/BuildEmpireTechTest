<?php


namespace Validators;


class Max implements Validator
{
    private $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return $value <= $this->max;
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field must be less than $this->max";
    }
}