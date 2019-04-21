<?php


namespace Controllers;


use Views\HTML;

class HomeController
{
    public function index()
    {
        return new HTML('home');
    }
}