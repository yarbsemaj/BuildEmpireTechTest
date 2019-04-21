<?php

use Middleware\Auth;
use Middleware\CSRFCheck;
use Routing\Routes\RouteController;

$routes = [
    'GET:/'=>(new RouteController('HomeController','index')),

    'GET:/login' => (new RouteController('LoginController', 'index')),
    'POST:/login' => (new RouteController('LoginController', 'login'))->middleware(new CSRFCheck()),
    'GET:/register' => (new RouteController('LoginController', 'registrationForm')),
    'POST:/register' => (new RouteController('LoginController', 'register'))->middleware(new CSRFCheck()),
    'GET:/logout' => (new RouteController('LoginController', 'logout'))->middleware(new Auth()),



];
