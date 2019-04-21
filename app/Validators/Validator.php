<?php


namespace Validators;


interface Validator
{
    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value);

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value);
}