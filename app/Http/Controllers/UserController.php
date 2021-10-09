<?php

namespace App\Http\Controllers;

use App\Contracts\Controllers\UserControllerContract;
use App\Models\UserModel;


class UserController implements UserControllerContract
{
    use Controller;

    public function login(): ResponseContract
    {
        return $this->view('userSystem/loginView');
    }
    
    public function createAccount(): ResponseContract
    {
        return $this->view('userSystem/createAccountView');
    }
    
    public function logInProcess(): ResponseContract
    {
        $user = UserModel::loginUser(
            $this->connectionDb, 
            $this->petition['email_users'], 
            $this->petition['password_users']
        );

        if ($user != false)
        {
            session_start();
            $_SESSION['id_user'] = $user->id_user;
            sessionStarted();
            
            header("Location:" . domain("read"));
        } else {
            sessionEnded();
            activeSession();
        }
    }
    
    public function createAccountProcess(): ResponseContract
    {
        $createAccountProcess = UserModel::createAccountProcess($this->connectionDb, $this->petition["name"], $this->petition["email"], $this->petition["password"]);
        $createAccount = function() use ($createAccountProcess)
        {
            if ($createAccountProcess === 'previously_registered_email')
            {
                $model =
                '<h1>El correo ya está registrado. Debes:</h1><br>
                <ol>
                    <li>
                    Iniciar sesión.
                    </li>                    
                    <li>
                     Elegir otro correo electrónico.
                    </li>                    
                    <li>
                    O recuperar tu contraseña.
                    </li>
                </ol>
                <form method="post" action="'. domain("logInProcess") .'">
                    <input type="submit" name="" class="form-control btn-primary mt-4" value="Regresar al inicio">
                </form>
                ';
                return $this->view('layouts/string', $model);
            } elseif ($createAccountProcess)
            {
                $model =
                '<h1>Tu cuenta ha sido creada con exito.</h1><br>
                <form method="post" action="'. domain("logInProcess") .'">
                    <input type="submit" name="" class="form-control btn-primary mt-4" value="Regresar al inicio">
                </form>
                ';
                return $this->view('layouts/string', $model);
            } else
            {
                $model =
                '<h1>Ha habído algun problema inesperado, por favor, comunicate con el administrador o intentalo nuevamente.</h1><br>
                <form method="post" action="'. domain("logInProcess") .'">
                    <input type="submit" name="" class="form-control btn-primary mt-4" value="Regresar al inicio">
                </form>
                ';
                return $this->view('layouts/string', $model);
            }
        };
        return $createAccount();
    }
}






