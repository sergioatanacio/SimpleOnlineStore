<?php

namespace AppTest\Http\Controllers;


use AppTest\RequestResponse\Response;

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
        $modelClassRun = new $modelClass($this->connectionDb, $petition);
        return $modelClassRun;
    }
}

