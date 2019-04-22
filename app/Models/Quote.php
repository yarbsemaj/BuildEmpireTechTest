<?php


namespace Models;


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
}