<?php

use Middleware\Auth;
use Middleware\CheckGetParams;
use Middleware\CSRFCheck;
use Middleware\Exist;
use Routing\Routes\RouteController;

$routes = [
    'GET:/'=>(new RouteController('HomeController','index')),

    'GET:/login' => (new RouteController('LoginController', 'index')),
    'POST:/login' => (new RouteController('LoginController', 'login'))->middleware(new CSRFCheck()),
    'GET:/register' => (new RouteController('LoginController', 'registrationForm')),
    'POST:/register' => (new RouteController('LoginController', 'register'))->middleware(new CSRFCheck()),
    'GET:/logout' => (new RouteController('LoginController', 'logout'))->middleware(new Auth()),

    'GET:/quotes' => (new RouteController('QuoteController', 'index'))->middleware(new Auth()),
    'GET:/quotes/create' => (new RouteController('QuoteController', 'create'))->middleware(new Auth()),
    'GET:/quotes/show' => (new RouteController('QuoteController', 'show'))
        ->middleware([new Auth(), new CheckGetParams(['id']), new Exist('Quote')]),




];
