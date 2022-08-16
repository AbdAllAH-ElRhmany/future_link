<?php

namespace Futurelink\Main\core;


class bootstrap
{
    private $controllers;
    private $method;
    private $params;


    public function __construct()
    {
        $this->url();
        $this->render();
        
    }

    private function url()
    {
        $url = trim($_SERVER['REQUEST_URI'],"/");
        $url = explode("/", $url, 3  );
        // var_dump($url); die;
        $this->controllers = (!empty($url[0])) ? $url[0] : "home";

        $this->method = (!empty($url[1])) ? $url[1] : "default";

        $this->params = (!empty($url[2])) ? explode("/", $url[2]) : [];

        // print_r($url);
        // var_dump($this->controllers, $this->method, $this->params);
    }


    private function render()
    {
        $controller = "Futurelink\\Main\\controllers\\".$this->controllers."Controller";
        if(!class_exists($controller)){
            $controller = "Futurelink\\Main\\controllers\\notFoundController";
        }
        $controller = new $controller;
        $controller->setController($this->controllers);
        $controller->setMethod($this->method);
        $controller->setParams($this->params);
        $this->method = $this->method."Method";
        if(!method_exists($controller, $this->method)){
            $this->method = "notFoundMethod";
        }
        
        call_user_func_array([$controller, $this->method], $this->params );
    }
}
