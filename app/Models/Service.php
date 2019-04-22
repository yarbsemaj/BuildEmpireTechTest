<?php


namespace Models;


use Database\Database;

class Service extends Model
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
}