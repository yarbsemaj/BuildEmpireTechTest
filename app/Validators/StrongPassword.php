<?php


namespace Validators;


class StrongPassword implements Validator
{

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $value);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return 'Your password is too weak, it must be a least 8 characters in length, have upper and lower case 
        letters, have at letters one numbers and one special characters';
    }
}
