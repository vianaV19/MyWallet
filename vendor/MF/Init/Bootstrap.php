<?php

namespace MF\Init;

abstract class Bootstrap{

    protected $routes;

    public function  __construct (){
        $this->init_routes();
        $this->run($this->getUrl());
    }

    protected abstract function init_routes();

    private function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function run($url)
    {
        foreach($this->routes as $route){
            if($route['url'] === $url){

                $class = '\\App\\Controller\\' . ucfirst($route['controller']); 

                $action = $route['action'];

                $controller = new $class;

                $controller->$action();
            }
        }
    }


}