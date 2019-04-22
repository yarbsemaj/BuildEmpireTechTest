<?php


namespace Database;


use Facades\Facade;

trait Queryable
{
    use Facade;

    private $wheres = [];

    protected function whereFacade($attribute, $value, $operation = '=')
    {
        $this->wheres[] = [$attribute, $operation, $value];
        return $this;
    }

    protected function getFacade()
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

    protected function firstFacade()
    {
        return $this->get()[0];
    }

    protected function findFacade($id)
    {
        $this->where($this->primaryKey, $id);
        return $this->get()[0];
    }
}