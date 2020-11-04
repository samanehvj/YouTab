<?php

class Application {
    protected $controller = 'HomeController';
    protected $action = 'index';
    protected $params = [];

    public function __construct() {  

        $this->setup();

        if(file_exists(CONTROLLER . $this->controller . '.php')) {
            $this->controller = new $this->controller;

            if(method_exists($this->controller, $this->action)){
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        }
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