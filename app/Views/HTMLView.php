<?php


namespace Views;


class HTMLView implements View
{
    private $viewName;
    private $vars;

    /**
     * Displays a given view
     * @param $name
     * @param null $data
     */
    public function __construct($name, $data = null)
    {
        $this->viewName = $name;
        $this->vars = $data;
    }

    public function render()
    {
        includeView($this->viewName, $this->vars);
    }
}