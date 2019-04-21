<?php


namespace Models;


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
}