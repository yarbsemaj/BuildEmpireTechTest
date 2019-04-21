<?php


namespace Routing\Routes;


abstract class Route
{

    private $middleware = [];

    /**
     * Route specific code
     */
    protected abstract function execute();

    /**
     *  Adds middleware to the route
     *
     * @param array|string $middleware
     * @return Route
     */
    public function middleware($middleware){
        if(is_array($middleware)){
            $this->middleware = array_merge($this->middleware, $middleware);
        }else{
            $this->middleware[] = $middleware;
        }

        return $this;
    }

    /**
     * Runs the route and all its associated middleware
     */
    public function go(){
        $this->runMiddleware();
        $this->execute();
    }

    /**
     * Runs all middleware associated with a route.
     */
    private function runMiddleware(){
        foreach ($this->middleware as $middlewareItem){
            $return = $middlewareItem->execute();

            if (!is_bool($return)) {
                $return->render();
                exit();
            }
        }
    }
}