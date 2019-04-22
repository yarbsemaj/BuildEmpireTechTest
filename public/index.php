<?php
require '../vendor/autoload.php';

session_start();

include('../routes.php');

$method = isset($_POST['_METHOD']) ? $_POST['_METHOD'] : $_SERVER['REQUEST_METHOD'];

$routes[$method . ':' . strtok($_SERVER['REQUEST_URI'], '?')]->go();

