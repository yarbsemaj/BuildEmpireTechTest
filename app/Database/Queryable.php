<?php


namespace Database;


use Facades\Facade;
use Models\Model;

trait Queryable
{
    use Facade;

    private $wheres = [];

    /**
     * Adds a new where clause to the query
     * @param $attribute
     * @param $value
     * @param string $operation
     * @return $this
     */
    protected function whereFacade($attribute, $value, $operation = '=')
    {
        $this->wheres[] = [$attribute, $operation, $value];
        return $this;
    }

    /**
     * Gets all results from the current query
     * @return array
     */
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

    /**
     * Gets the first result from a the query
     * @return Model
     */
    protected function firstFacade()
    {
        return $this->get()[0];
    }

    /**
     * Finds a model by an id provided
     * @param $id
     * @return Model
     */
    protected function findFacade($id)
    {
        $this->where($this->primaryKey, $id);
        return $this->get()[0];
    }
}