<?php


namespace Models;


class ProductType extends Model
{
    public $tableName = 'product_types';

    public function products()
    {
        return $this->hasMany('Product');
    }
}