<?php
namespace App\Contracts\User;

use App\Contracts\RouteHelpers\ResponseContract;

interface ProductCategoryContract
{

    public function login(): ResponseContract;

    public function loginProcess(): ResponseContract;

    public function createAccount(): ResponseContract;
    
    public function createAccountProcess(): ResponseContract;

}


