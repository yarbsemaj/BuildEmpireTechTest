<?php


namespace Models;


use Database\Database;

class Quote extends OwnedModel
{
    public $tableName = 'quotes';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function goods()
    {
        return $this->hasMany('Good');
    }

    public function services()
    {
        return $this->hasMany('Service');
    }

    public function subscriptions()
    {
        return $this->hasMany('Subscription');
    }

    public function getTotal()
    {
        return number_format(
            (float)Database::query(
                'SELECT SUM(product_list.total) as total FROM (
                    (SELECT (5 * (DATEDIFF(subscriptions.end_date, subscriptions.start_date) DIV 7) + MID(\'0123444401233334012222340111123400012345001234550\', 7 * WEEKDAY(subscriptions.start_date) + WEEKDAY(subscriptions.end_date) + 1, 1))* products.price AS total 
                    FROM subscriptions JOIN products ON subscriptions.product_id = products.id
                    WHERE subscriptions.quote_id = ?)
                    UNION ALL
                    (SELECT goods.quantity * products.price AS total 
                    FROM goods JOIN products ON goods.product_id = products.id
                    WHERE goods.quote_id = ?)
                    UNION ALL
                    (SELECT TIMESTAMPDIFF(MINUTE, services.start_time, services.end_time) * services.length * (products.price/60) AS total 
                    FROM services JOIN products ON services.product_id = products.id
                    WHERE services.quote_id = ?)) as product_list;', [$this->id, $this->id, $this->id])->fetch()['total'], 2);
    }
}