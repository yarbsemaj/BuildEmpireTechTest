<?php


namespace Middleware;


use Views\Error;
use Views\View;

class Owns implements Middleware
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
        $this->model = "\Models\\$model";
    }

    /**
     * Returns true on pass, an action in the form of a view on fail
     * @return View|bool
     */
    public function execute()
    {
        $model = $this->model;
        return $model::find($_GET[$this->urlPram]) != \AccessControl\Auth::id() ? new Error(404) : true;
    }
}