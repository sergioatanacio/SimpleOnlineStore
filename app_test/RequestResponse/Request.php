<?php

namespace App\RequestResponse;

class Request
{
    protected $controller;
    protected $method;
    protected $petition;
    protected $connectionDb;

    public function __construct(){}

    public function setInstance(
        string $controllerRoute, 
        string $methodRoute, 
        array $petitionRoute, 
        object $connectionDbRoute)
    {
        $this->controller   = $controllerRoute;
        $this->method       = $methodRoute;
        $this->petition     = $petitionRoute;
        $this->connectionDb = $connectionDbRoute;

        return $this;
    }
    
    public function getController()
    {
        $controller = $this->controller;

        return "App\Http\Controllers\\{$controller}";
    }
    
    public function getMethod()
    {
        return $this->method;
    }

    public function send()
    {
        $controller = $this->getController();
        $method = $this->getMethod();

        $controllerObject = new $controller($this->petition, $this->connectionDb);

        $response = call_user_func([
            $controllerObject,
            $method
        ]);

        return $response->send();
    }
}