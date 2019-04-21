<?php


namespace Middleware;


use Views\View;

interface Middleware
{
    /**
     * Returns true on pass, an action in the form of a view on fail
     * @return View|bool
     */
    public function execute();
}