<?php


namespace Models;


class User extends Model
{
    public $tableName = 'users';

    public function quotes()
    {
        return $this->hasMany('Quote');
    }
}