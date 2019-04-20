<?php
require '../vendor/autoload.php';

session_start();

include('../routes.php');

$routes[$_SERVER['REQUEST_METHOD'].':'.$_SERVER['REQUEST_URI']]->go();

