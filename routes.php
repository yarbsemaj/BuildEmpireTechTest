<?php

use Routing\Routes\RouteController;

$routes = [
    'GET:/'=>(new RouteController('HomeController','index')),
];
