<?php


namespace Models;


use Facades\Facade;

abstract class OwnedModel extends Model
{
    use Facade;

    /**
     * Gets the owner id of the current model
     * @return int
     */
    public function getOwnerId()
    {
        return $this->user_id;
    }

    /**
     * Returns all owned model
     * @param int $id Id of the owner
     * @return Model OwnedModel
     */
    protected function getOwnedModelsFacade($id)
    {
        return $this->where('user_id', $id)->get();
    }

}