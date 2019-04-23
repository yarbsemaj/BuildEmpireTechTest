<?php
require '../vendor/autoload.php';

session_start();

include('../routes.php');

$method = isset($_POST['_METHOD']) ? $_POST['_METHOD'] : $_SERVER['REQUEST_METHOD'];

if (!isset($routes[$method . ':' . strtok($_SERVER['REQUEST_URI'], '?')])) {
    (new \Views\Error(404))->render();
}

$routes[$method . ':' . strtok($_SERVER['REQUEST_URI'], '?')]->go();

