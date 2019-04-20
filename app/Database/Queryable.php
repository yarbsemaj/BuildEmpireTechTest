<?php


namespace Database;


trait Queryable
{
    private $wheres = [];

    function where($attribute, $value, $operation = '=')
    {
        $this->wheres[] = [$attribute, $operation, $value];
        return $this;
    }

    function get()
    {
        $queryString = "SELECT * FROM $this->tableName";
        $values = [];
        foreach ($this->wheres as $iteration => $where) {
            $queryString .= " WHERE $where[0] $where[1] ? ";
            if ($iteration != 0) {
                $queryString .= 'AND';
            }
            $values[] = $where[2];
        }
        $queryString .= ';';
        return Database::modelQuery($queryString, $values, $this);
    }


}