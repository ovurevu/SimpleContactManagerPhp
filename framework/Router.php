<?php
class Router {
    protected $routes = [];

    public function define($routes){
        $this->routes = $routes;
    }

    public function direct($uri){
        if(array_key_exists($uri, $this->routes)){
            return $this->routes[$uri];
        }

        die('The page you are looking for does not exist');
    }
}