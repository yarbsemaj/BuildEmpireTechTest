<?php


namespace Database;

trait Relatable
{
    public function hasMany($model)
    {
        $classPath = "Models\\$model";
        $class = new $classPath();
        $foreignTableName = $class->tableName;
        $foreignKey = substr($this->tableName, 0, -1) . '_id';
        $primaryKey = $this->primaryKey;

        $query = "SELECT * FROM $foreignTableName WHERE $foreignKey = ? ;";
        return Database::modelQuery($query, [$this->$primaryKey], $class);
    }
}