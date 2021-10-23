<?php
namespace App\Contracts\Helpers;

use App\Contracts\RouteHelpers\ResponseContract;
use App\Contracts\Controller\ControllerContract;

interface RouteContract
{

    public static function Connect(): \PDO;
    public static function get($route, $controller, $requestObject, $request_uri, $petition, $connect): ControllerContract;

}

