<?php

namespace App\RequestResponse;
use App\Contracts\RequestResponse\ResponseContract;

class Response implements ResponseContract
{
    protected $view, $model;

    public function __construct(){}

    public function setInstance($viewResponse): self
    {
        $this->view     = $viewResponse["view"];
        $this->model    = $viewResponse["model"];

        return $this;
    }

    public function getView()
    {
        return $this->view;
    }

    public function send()
    {
        $view = $this->getView();
        $model = $this->model;
        return require viewPath($view);
    }
}

