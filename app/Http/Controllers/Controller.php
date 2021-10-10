<?php

namespace App\Http\Controllers;


use App\RequestResponse\Response;

trait Controller
{
    protected $petition, $connectionDb, $responseObject;

    public function __construct($petition, $connectionDb, $responseObject = null)
    {
        $this->petition         = $petition;
        $this->connectionDb     = $connectionDb;
        $this->responseObject   = $responseObject ?? new Response();
    }

    public function view(string $viewOfView, $model = null) {

        $viewReturn = [
            "view"      => $viewOfView,
            "model"     => $model,
        ];
        return $this->responseObject->setInstance($viewReturn);
    }

    public function model($modelRun, $petition)
    {
        $modelClass = "App\Models\\{$modelRun}";
        return new $modelClass($this->connectionDb, $petition);
    }
}

