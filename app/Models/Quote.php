<?php


namespace Models;


class Quote extends Model
{
    public $tableName = 'quotes';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function good()
    {
        return $this->hasMany('Good');
    }

    public function service()
    {
        return $this->hasMany('Service');
    }

    public function subscription()
    {
        return $this->hasMany('Subscription');
    }
}