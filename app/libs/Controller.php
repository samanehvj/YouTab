<?php

class Controller 
{
    protected $view;

    public function view($viewFile, $viewData = []) 
    {
        $this->view = new View($viewFile, $viewData);
        return $this->view;
    }
}