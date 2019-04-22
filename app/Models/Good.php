<?php


namespace Models;


use Database\Database;

class Good extends OwnedModel
{
    public $tableName = 'goods';

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function getTotal()
    {
        return number_format(
            (float)Database::query(
            'SELECT goods.quantity * products.price AS total 
                    FROM goods JOIN products ON goods.product_id = products.id
                    WHERE goods.id = ?;', [$this->id])->fetch()['total'], 2);
    }

    public function quote()
    {
        return $this->belongsTo('Quote');
    }

    /**
     * Gets the owner id of the current model
     * @return int
     */
    public function getOwnerId()
    {
        return $this->quote()->getOwnerId();
    }

    /**
     * Returns all owned model
     * @param int $id Id of the owner
     * @return Model OwnedModel
     */
    protected function getOwnedModelsFacade($id)
    {
        return false;
    }
}