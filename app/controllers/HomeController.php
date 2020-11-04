<?php

class HomeController extends Controller 
{

    public function index() 
    {
        $this->view('index');
        $this->view->render();
    }
    
    public function about() 
    {
        echo "I am in class: " . __CLASS__ . " calling method: " . __METHOD__;
    }
}