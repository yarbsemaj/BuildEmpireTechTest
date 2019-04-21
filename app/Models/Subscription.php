<?php


namespace Models;


class Subscription extends Model
{
    public $tableName = 'subscriptions';

    public function product()
    {
        return $this->belongsTo('Product');
    }
}