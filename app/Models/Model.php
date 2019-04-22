<?php


namespace Models;


use Database\Queryable;
use Database\Relatable;
use Database\Saveable;

abstract class Model
{
    use Queryable;
    use Relatable;
    use Saveable;

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