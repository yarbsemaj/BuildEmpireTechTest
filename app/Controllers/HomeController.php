<?php


namespace Controllers;


use Views\HTMLView;

class HomeController
{
    public function index()
    {
        return new HTMLView('home');
    }
}