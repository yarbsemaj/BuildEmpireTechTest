<?php


namespace Models;


class Good extends Model
{
    public $tableName = 'goods';

    public function product()
    {
        return $this->belongsTo('Product');
    }
}