<?php


namespace Views;


class HTML implements View
{
    private $viewName;
    private $vars;

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