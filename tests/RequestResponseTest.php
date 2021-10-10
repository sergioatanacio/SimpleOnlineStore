<?php

use PHPUnit\Framework\TestCase;
/**
 * $ composer require --dev phpunit/phpunit
 * $ composer dump
 * $ vendor/phpunit/phpunit/phpunit
 */
Use App\RequestResponse\Request;

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
         */

        # $request = new Request();
        # $request->setInstance('UserController', 'login', null, null);
        #$route = Route::get('', 'UserController@login', null, '/', [], null);

        #var_dump($route);
        $this->assertTrue(true);

        /*
        $rutaInicial = Route::get('', 'UserController@login', null, "/", [], null);

        $this->assertTrue(is_string($rutaInicial));
         */
    }
    public function test_request_response()
    {


        #$comment = new Comment();

        #$post->addComment($comment);

        # $this->assertEquals(1, $post->countComments());
        # $this->assertInstaceOf(Comment::class, $post->getComments()[0]);
    }
}