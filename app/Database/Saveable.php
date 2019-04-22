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
        if ($this->$pk) {
            $this->update();
        } else {
            $id = $this->insert();
            $this->$pk = $id;
        }
    }

    /**
     * Removes the current model to the database
     *
     */
    public function delete()
    {
        $pk = $this->primaryKey;
        if ($this->$pk) {
            Database::delete($this->tableName, $this->primaryKey, $this->$pk);
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