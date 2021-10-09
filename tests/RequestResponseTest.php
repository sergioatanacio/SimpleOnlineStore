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
    public function test_request_response()
    {
        $request = new Request();
        $request->setInstance('UserController', 'login', null, null);

        


        /* 
        $rutaInicial = Route::get('', 'UserController@login', null, "/", [], null);

        $this->assertTrue(is_string($rutaInicial));
         */

        #$comment = new Comment();

        #$post->addComment($comment);

        # $this->assertEquals(1, $post->countComments());
        # $this->assertInstaceOf(Comment::class, $post->getComments()[0]);
    }
}