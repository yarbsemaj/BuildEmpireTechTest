<?php


namespace Validators;


class Email implements Validator
{

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) == $value;
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return 'Your email does not appear to be valid';
    }
}