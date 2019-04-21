<?php


namespace Validators;


class Required implements Validator
{

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return isset($_POST[$field]);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field is required";
    }
}