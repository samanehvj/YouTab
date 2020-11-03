<?php

class Application {
    protected $controller = 'HomeController';
    protected $action = 'index';
    protected $params = [];

    public function __construct() {  
        echo "<pre>";
        
        // var_dump($_SERVER);  
        $this->setup();
        echo $this->controller . '->';
        echo $this->action . '(';
        foreach($this->params as $key => $param) {
            if($key == 0)
                echo $param;
            else   
                echo ', ' . $param;
        }
        echo ')';

        echo '</pre>';
    }

    protected function setup() {
        $request = trim($_SERVER['REQUEST_URI'], '/');
        $url = [];
  
        if(empty($request)) {
            return;
        }
        $url = explode('/', $request);   

        if(!isset($url[0])) {
            return;
        }
        $this->setController($url[0]);

        if(!isset($url[1])) {
            return;
        }
        $this->setAction($url[1]);

        unset($url[0], $url[1]);
        
        if(isset($url)) {
            $this->setParams($url);
        }
    }

    protected function setController($controller) {
        $this->controller = ucfirst($controller) . 'Controller';
    }

    protected function setAction($action) {
        $this->action = $action;
    }

    protected function setParams($params) {
        $this->params = array_values($params);
    }

}