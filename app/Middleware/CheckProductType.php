<?php


namespace Middleware;


use Models\Product;
use Views\Error;
use Views\View;

class CheckProductType implements Middleware
{

    private $urlPram, $model;

    /**
     * Checks that a model been references exists in the database.
     * @param string $model
     * @param string $urlPram
     */
    public function __construct($model, $urlPram = 'id')
    {
        $this->urlPram = $urlPram;
        $this->model = $model;
    }

    /**
     * Returns true on pass, an action in the form of a view on fail
     * @return View|bool
     */
    public function execute()
    {
        return Product::find($_GET[$this->urlPram])->productType()->model != $this->model ? new Error(404) : true;
    }
}