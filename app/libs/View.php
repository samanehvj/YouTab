<?php

class View 
{
    protected $viewFile;
    protected $viewData;
    public $pageTitle = SITENAME;

    public function __construct($viewFile, $viewData)
    {
        $this->viewFile = $viewFile;
        $this->viewData = $viewData;
    }

    public function render()
    {
        $viewFile = VIEW . $this->viewFile . '.php';
        if (file_exists($viewFile)) {
            include $viewFile;
        }
    }

    public function getAction()
    {
        $action = explode('/', $this->viewFile);

        if (is_array($action))
            return  end($action);
        return $this->viewFile;
    }
}