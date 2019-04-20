<?php


namespace Controllers;


use UserRepository;

class HomeController
{
    public function index()
    {

        print_r((new UserRepository())->getUserByEmail(''));
    }
}