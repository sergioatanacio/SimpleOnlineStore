<?php
namespace Tests\Route;

use App\Helpers\Route;
use App\RequestResponse\Request;
use App\RequestResponse\RouteWithoutStaticMethod;
use PHPUnit\Framework\TestCase;
use ResourceTest\RequestResponse\RequestFake;
use ResourceTest\RequestResponse\RouteWithoutStaticFake;
// use App\Post;
// use App\Comment;

class RouteTest extends TestCase
{
    public function test_RouteTest()
    {
        #$requestClass = new ClassTestRequest;
        $route              = '';
        $controllerMethod   = 'AdministrativeController@login';
        $requestExtract     = ['PetitionRequest'];
        $request            = new RequestFake();
        $extractRouteServer = "/";
        $routeStatic        = new RouteWithoutStaticFake();

        $uno = Route::get(
            $route, $controllerMethod, $requestExtract, $routeStatic, $request, $extractRouteServer);

        $this->assertEquals("App\Http\Controllers\AdministrativeController login PetitionRequest", $uno);

        $dos = RouteWithoutStaticMethod::getInstance()->setInstance(
            $route, $controllerMethod, $requestExtract, $request, $extractRouteServer)->send();

        $this->assertEquals("App\Http\Controllers\AdministrativeController login PetitionRequest", $dos);




        #$tres = Request::getInstance()->setInstance($controllerRoute, $methodRoute, $petitionRoute, $response);
        /*
        $routeWithoutStaticMethod = new RouteWithoutStaticMethod(
            "login",
            "AdministrativeController@login",
            [],
            $requestClass,
            "/login",
        );

        $result = $routeWithoutStaticMethod->send();

        $this->assertEquals("App\Http\Controllers\AdministrativeController login", $result);*/

        #$this->assertTrue(is_object($userController->login()));
    }
}