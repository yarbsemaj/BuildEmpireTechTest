<?php


namespace Models;


use Database\Queryable;

abstract class Model
{
    use Queryable;

    public $primaryKey = 'id';
    public $tableName;

    public $attributes = [];

    public function __get($name)
    {
        return $this->attributes[$name];
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
}