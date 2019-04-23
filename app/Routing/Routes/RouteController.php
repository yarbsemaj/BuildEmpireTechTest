<?php


namespace Routing\Routes;



class RouteController extends Route
{
    private $controller;
    private $method;

    /**
     * A route resulting in controller method execution.
     * @param string $controller name of controller class
     * @param string $method
     */
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
        $view = $controller->$method();
        $view->render();
    }
}