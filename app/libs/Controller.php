<?php

class Controller 
{
    protected $view;

    public function setView($viewFile, $viewData = []) 
    {
        $this->view = new View($viewFile, $viewData);
        return $this->view;
    }
}