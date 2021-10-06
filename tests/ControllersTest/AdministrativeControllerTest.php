<?php
namespace Tests\ControllersTest;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\{AdministrativeController, Controller, FolderController};
use ResourceTest\RequestResponse\ResponseFake;

// use App\Post;
// use App\Comment;

class AdministrativeControllerTest extends TestCase
{
    public function test_controller()
    {
        /* 
        $petition   = [];
        $response   = new ResponseFake();

        $uno = new AdministrativeController($petition, $response);
        $this->assertTrue(is_object($uno->login()));

        $this->assertEquals("userSystem/loginView", $uno->login()->send()); */


        #"userSystem/loginView",
        #$controller = new AdministrativeController($petition);
        #$controller->login();
        #$this->assertTrue(is_object($controller->login()));
        #$controller->read();

        #$folder = new FolderController();

        #$controller->view("userSystem/loginView");
        #$controller->model();
        #$controller->modelMethod();
        #$controller->modelMethodRequest();

        #$userController = new UserController([]);
        #$userController->login();
        #$userController->createAccount();
        #$userController->logInProcess();
        #$userController->createAccountProcess();
        #$this->assertTrue(is_object($userController->login()));


    }
}