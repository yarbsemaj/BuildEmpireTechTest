<?php


namespace Models;


use Database\Database;

class Service extends OwnedModel
{
    public $tableName = 'services';

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function weekday()
    {
        return $this->belongsTo('Weekday');
    }

    public function getTotal()
    {
        return number_format(
            (float)Database::query(
                'SELECT TIMESTAMPDIFF(MINUTE, services.start_time, services.end_time) * services.length * (products.price/60) AS total 
                    FROM services JOIN products ON services.product_id = products.id
                    WHERE services.id = ?;', [$this->id])->fetch()['total'], 2);
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