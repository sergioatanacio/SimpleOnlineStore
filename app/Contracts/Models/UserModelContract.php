<?php
namespace App\Contracts\Models;

use App\Contracts\RequestResponse\ResponseContract;

interface UserModelContract
{

    public function login(): ResponseContract;

    public function loginProcess(): ResponseContract;

    public function createAccount(): ResponseContract;
    
    public function createAccountProcess(): ResponseContract;

}


