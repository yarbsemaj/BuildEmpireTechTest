<?php


namespace Validators;


class NotWeekendDay implements Validator
{

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        $weekday = date('w', strtotime($value));
        return !($weekday == 0 || $weekday == 6);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "$field must not be a weekend";
    }
}