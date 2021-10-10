<?php
namespace AppTest\Contracts\User;

use AppTest\Contracts\RouteHelpers\ResponseContract;

interface CategoryGroupContract
{

    public function login(): ResponseContract;

    public function loginProcess(): ResponseContract;

    public function createAccount(): ResponseContract;
    
    public function createAccountProcess(): ResponseContract;

}


