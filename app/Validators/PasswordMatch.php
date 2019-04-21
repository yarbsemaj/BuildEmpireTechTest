<?php


namespace Validators;


use Bcrypt\Bcrypt;

class PasswordMatch implements Validator
{

    private $cypherText;

    /**
     *  Validates a Bcrypt password
     * @param string $cypherText
     */
    public function __construct($cypherText)
    {
        $this->cypherText = $cypherText;
    }

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return Bcrypt::verify($value, $this->cypherText);
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return 'Your password doesnt match one we have on record';
    }
}