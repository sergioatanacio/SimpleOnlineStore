<?php
namespace App\Contracts\Controllers;

use App\Contracts\RequestResponse\ResponseContract;

interface UserControllerContract
{
    public function login(): ResponseContract;

    public function loginProcess(): ResponseContract;

    public function createAccount(): ResponseContract;

    public function createAccountProcess(): ResponseContract;

}


