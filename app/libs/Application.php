<?php

class Application {
    protected $controller = '';
    protected $action = '';
    protected $params = [];

    public function __construct() {       
        print_r($this->prepareUrl());
    }

    protected function prepareUrl() {
        $request = trim($_SERVER['REQUEST_URI'], '/');
        $url = [];

        if(!empty($request)) {
            $url = explode('/', $request);
        }

        return $url;
    }

}