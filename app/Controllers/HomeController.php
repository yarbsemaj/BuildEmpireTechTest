<?php


namespace Controllers;


use AccessControl\Auth;
use Views\Redirect;

class HomeController
{
    public function index()
    {
        if (Auth::auth()) {
            return new Redirect('/quotes');
        } else {
            return new Redirect('/login');
        }
    }
}