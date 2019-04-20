<?php


namespace Routing\Routes;



class RouteController extends Route
{
    private $controller;
    private $method;

    public function __construct($controller, $method)
    {
        $this->controller = $controller;
        $this->method = $method;
    }

    protected function execute()
    {
        $method = $this->method;
        $controllerName = "\Controllers\\$this->controller";
        $controller = new $controllerName();
        $controller->$method();
    }
}