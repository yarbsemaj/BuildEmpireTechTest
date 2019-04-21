<?php


namespace Views;


class Error implements View
{
    private $code;

    /**
     * Generates an error page with the given html code.
     * @param $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    public function render()
    {
        http_response_code($this->code);
        die();
    }
}