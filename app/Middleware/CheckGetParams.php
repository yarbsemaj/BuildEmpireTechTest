<?php


namespace Middleware;


use Views\Error;
use Views\View;

class CheckGetParams implements Middleware
{
    private $prams = [];

    /**
     * Checks the URL has the array of prams
     * @param array $prams
     */
    public function __construct(array $prams)
    {
        $this->prams = $prams;
    }

    /**
     * Returns true on pass, an action in the form of a view on fail
     * @return View|bool
     */
    public function execute()
    {
        foreach ($this->prams as $pram) {
            if (!isset($_GET[$pram])) {
                return new Error(404);
            }
        }

        return true;
    }
}