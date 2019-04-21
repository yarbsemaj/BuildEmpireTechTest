<?php


namespace Database;

use Models\Model;

trait Relatable
{
    /**
     * Returns an array to related models where this model does not contain the foreign key.
     * @param string $model
     * @return array
     */
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

    /**
     * Returns a single model that belong to this model where this does contain the foreign key.
     * @param string $model
     * @return Model
     */
    public function belongsTo($model)
    {
        $classPath = "Models\\$model";
        $class = new $classPath();
        $foreignTableName = $class->tableName;
        $foreignPrimaryKey = $class->primaryKey;
        $foreignKeyName = substr($this->tableName, 0, -1) . '_id';
        $foreignKey = $this->$foreignKeyName;

        $query = "SELECT * FROM $foreignTableName WHERE $foreignPrimaryKey = ? ;";
        return Database::modelQuery($query, [$this->$foreignKey], $class)[0];
    }
}