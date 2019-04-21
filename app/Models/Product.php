<?php


namespace Models;


class Product extends Model
{
    public $tableName = 'products';

    public function productType()
    {
        return $this->belongsTo('ProductType');
    }

    /**
     * Returns an array of all related intermediary stages between this and a quote specific for this product type.
     * @return array
     */
    public function quoteLinks()
    {
        return $this->hasMany($this->productType()->model);
    }
}