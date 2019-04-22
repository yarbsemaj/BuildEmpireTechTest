<?php


namespace Models;


use Database\Database;

class Good extends Model
{
    public $tableName = 'goods';

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function getTotal()
    {
        return Database::query(
            'SELECT goods.quantity * products.price AS total 
                    FROM goods JOIN products ON goods.product_id = products.id
                    WHERE goods.id = ?;', [$this->id])->fetch()['total'];
    }
}