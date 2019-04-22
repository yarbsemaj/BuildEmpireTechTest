<?php


namespace Validators;


class Min implements Validator
{
    private $min;

    public function __construct($min)
    {
        $this->min = $min;
    }

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return $value >= $this->min;
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