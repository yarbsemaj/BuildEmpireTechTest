<?php


namespace Middleware;


use Views\Redirect;
use Views\View;

class Auth implements Middleware
{

    /**
     * Returns true on pass, an action in the form of a view on fail
     * @return View|bool
     */
    public function execute()
    {
        return \AccessControl\Auth::auth() ? true : new Redirect('/login');
    }
}