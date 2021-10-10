<?php
namespace AppTest\Contracts\Controllers;

use AppTest\Contracts\RequestResponse\ResponseContract;

interface UserControllerContract
{
    public function login(): ResponseContract;

    public function loginProcess(): ResponseContract;

    public function createAccount(): ResponseContract;

    public function createAccountProcess(): ResponseContract;

}


