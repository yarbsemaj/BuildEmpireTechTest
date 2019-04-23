<?php


namespace Models;


use Database\Database;

class Subscription extends OwnedModel
{
    public $tableName = 'subscriptions';

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function getTotal()
    {
        return number_format(
            (float)Database::query(
                'SELECT (5 * (DATEDIFF(subscriptions.end_date, subscriptions.start_date) DIV 7) + MID(\'0123444401233334012222340111123400012345001234550\', 7 * WEEKDAY(subscriptions.start_date) + WEEKDAY(subscriptions.end_date) + 1, 1))* products.price AS total 
                    FROM subscriptions JOIN products ON subscriptions.product_id = products.id
                    WHERE subscriptions.id = ?;', [$this->id])->fetch()['total'], 2);
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