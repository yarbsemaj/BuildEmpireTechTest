<?php


namespace Validators;


class Time implements Validator
{

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $value);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field must be a valid time";
    }
}