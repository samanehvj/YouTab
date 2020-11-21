<?php

class Controller 
{
    protected $view;

    public function go($controller, $action)
    {
        $goingTo = "Location: " . URLROOT . "/" . $controller . "/" . $action;

        header($goingTo);
    }

    public function setView($viewFile, $viewData = []) 
    {
        $this->view = new View($viewFile, $viewData);
        return $this->view;
    }

    public function model($model)
    {
        $model = ucfirst($model);
        require_once MODEL . $model . '.php';
        return new $model;
    }
}