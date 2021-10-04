<?php
namespace App\Contracts\User;

use App\Contracts\RouteHelpers\ResponseContract;

interface UserContract
{

    public function login(): ResponseContract;


    public function createAccount(): ResponseContract;


}


