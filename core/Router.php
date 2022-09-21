<?php

class Router
{
    protected $routes = [];

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)){
            return $this->routes[$uri]; 
        }
        echo "<h1>404 - Page not found!</h1>";
        throw new Exception("404 - Page not found!");
    }
}