<?php


namespace Models;


class Weekday extends Model
{
    public $tableName = 'weekdays';

    public function service()
    {
        return $this->hasMany('Service');
    }
}