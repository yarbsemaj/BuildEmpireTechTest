<?php
require '../vendor/autoload.php';

session_start();

include ('../routes.php');

print($routes[$_SERVER['REQUEST_METHOD'].':'.$_SERVER['REQUEST_URI']]);

