<?php
namespace AppTest\Contracts\Models;

use AppTest\Contracts\RequestResponse\ResponseContract;

interface UserModelContract
{

    public function login(): ResponseContract;

    public function loginProcess(): ResponseContract;

    public function createAccount(): ResponseContract;
    
    public function createAccountProcess(): ResponseContract;

}


