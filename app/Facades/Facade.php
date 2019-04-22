<?php


namespace Facades;


trait Facade
{
    public static function __callStatic($name, $arguments)
    {
        $instance = new static();

        $method = $name . 'Facade';

        if (method_exists($instance, $method)) {
            return call_user_func_array([$instance, $method], $arguments);
        }
    }

    public function __call($name, $arguments)
    {
        $method = $name . 'Facade';

        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $arguments);
        }
    }
}