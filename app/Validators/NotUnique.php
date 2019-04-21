<?php


namespace Validators;


class NotUnique implements Validator
{
    private $model;
    private $column;

    /**
     * Checks that the value in the field is not unique in the database
     * @param string $model The name of the model to be looked at
     * @param string $column the column to be looked at
     */
    public function __construct($model, $column)
    {
        $modelClassPath = "\Models\\$model";
        $this->model = new $modelClassPath();
        $this->column = $column;
    }

    /**
     * Validated the filed in question
     * @param $field
     * @param $value
     * @return bool
     */
    public function validate($field, $value)
    {
        return !empty($this->model->where($field, $value)->get());
    }

    /**
     * Returns the message to be displayed when validation fails.
     * @param $field
     * @param $value
     * @return string
     */
    public function message($field, $value)
    {
        return "It looks like an item with that $field doesnt exists";
    }
}