<?php

use PHPUnit\Framework\TestCase;
/**
 * $ composer require --dev phpunit/phpunit
 * $ composer dump
 * $ vendor/phpunit/phpunit/phpunit
 */
#Use App\RequestResponse\Request;
#use App\Helpers\Route;
use App\Contracts\Helpers\RouteContract;


class RequestResponseTest extends TestCase
{
    public function test_route()
    {
        /**
         * Route es una clase con un método estático que lo que hace es iniciar todos los elementos para que
         * funcione la aplicación. Entre ellos está: Conectarse a la base de datos, recibir las URLs, las
         * peticiones get y post entre otras, e instanciar la clase que va a requerir la vista, el cual
         * es request.
         *
         * Las clases son creadas por traits y por interfaces.
         *
         * Lo primero que vamos a testear es que la conexión se hay realizado y que por tanto el método estático
         * retorne un objeto PDO.
         */

        $routeConnect = fn(PDO $connect) => $connect;
        $this->assertTrue
        (
            is_object
            (
                $routeConnect
                (
                    Route::Connect()
                )
            )
        );

        #$RouteImplementController = fn(ControllerContract $route) => $route;
        #$this->assertTrue(is_object($RouteImplementController(new Route())));
        /**
         * El método get es para ejecutar el código del controlador y de la vista. Debe retornar un método
         * request, he incluso un método response.
         */
        # $request = new Request();
        # $request->setInstance('UserController', 'login', null, null);
        #$route = Route::get('', 'UserController@login', null, '/', [], null);

        #Route::get($route, $controller, $requestObject = null, $request_uri = null, $petition = null, $connect = null)
        #$this->assertTrue(true);

        #$rutaInicial = Route::get('', 'UserController@login', null, "/", [], null);
        #$this->assertTrue(is_string($rutaInicial));


        $rutaInicial = Route::get
        (
            '',
            'UserController@login',
            null,
            "/",
            [],
            null
        );

        $this->assertTrue(is_string($rutaInicial));

    }
    public function test_request_response()
    {


        #$comment = new Comment();

        #$post->addComment($comment);

        # $this->assertEquals(1, $post->countComments());
        # $this->assertInstaceOf(Comment::class, $post->getComments()[0]);
    }
}