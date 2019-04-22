<?php


namespace Database;


trait Saveable
{
    /**
     * Save the current model to the database
     *
     */
    public function save()
    {
        $pk = $this->primaryKey;
        if (isset($this->$pk)) {
            $this->update();
        } else {
            $id = $this->insert();
            $this->$pk = $id;
        }
    }

    /**
     * Update the database
     */
    private function update()
    {
        Database::update($this->tableName, $this->attributes, $this->primaryKey);
    }

    /**
     * Insert into the database
     * @return int model id
     */
    private function insert()
    {
        return Database::insert($this->tableName, $this->attributes);
    }

}