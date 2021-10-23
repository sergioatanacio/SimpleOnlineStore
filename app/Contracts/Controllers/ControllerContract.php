<?php

namespace App\Contracts\Controllers;

interface ControllerContract
{
    public function view(string $viewOfView, $model = null);

    public function model($modelRun, $petition);
}