<?php

namespace App\RequestResponse;

class Request
{
    protected string $controller;
    protected string $method;
    protected array $petition;
    protected object $connectionDb;

    public function __construct(){}

    public function setInstance(
        string $controllerRoute, 
        string $methodRoute, 
        array $petitionRoute, 
        object $connectionDbRoute): self
    {
        $this->controller   = $controllerRoute;
        $this->method       = $methodRoute;
        $this->petition     = $petitionRoute;
        $this->connectionDb = $connectionDbRoute;

        return $this;
    }
    
    public function getController(): string
    {
        $controller = $this->controller;

        return "App\Http\Controllers\\{$controller}";
    }
    
    public function getMethod(): string
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