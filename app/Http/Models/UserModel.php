<?php

namespace App\Http\Models;

class UserModel
{
    use Model;

    public $id_user;
    public $nombre;
    public $email;
    
    public function __construct($id_user, $nombre, $email)
    {
        $this->id_user  = $id_user;
        $this->nombre   = $nombre;
        $this->email    = $email;
    }

    public static function loginUser($connectionDb, $email_users, $password_users)
    {
        $sql = "SELECT * FROM users WHERE email = ? AND password_users = ? AND enable_disable = '1' ";
        $readUsers = $connectionDb->prepare($sql);
        $readUsers->execute(array($email_users, $password_users));

        $leer_usuarios = assocQuery($readUsers);
        echo '<pre>';
        var_dump($leer_usuarios);
        echo '</pre>';

        if (count($leer_usuarios)>=1){
            $recorriendo_usuarios = $leer_usuarios[0];
            return new self($recorriendo_usuarios['id_user'], $recorriendo_usuarios['nombre'], $recorriendo_usuarios['email']);
        } else {
            return false;
        }
    }

    public static function anUser($connectionDb, $id_user)
    {
        $sql = "SELECT * FROM users WHERE id_user = ? AND enable_disable = '1' ";
        $readUsers = $connectionDb->prepare($sql);
        $readUsers->execute(array($id_user));
        $leer_usuarios = assocQuery($readUsers);

        if (count($leer_usuarios)>=1){
            $recorriendo_usuarios = $leer_usuarios[0];
            return new self($connectionDb, null, $recorriendo_usuarios['id_user'], $recorriendo_usuarios['nombre'], $recorriendo_usuarios['email']);
        } else {
            return false;
        }
    }

    public static function createAccountProcess($connectionDb, $name, $email, $password)
    {
        $validateDataExistence = self::validateDataExistence($connectionDb, 'users', 'email', $email);
        if ($validateDataExistence === true)
        {
            return "previously_registered_email";
        } else
        {
            $id_user = self::increaseIdValue($connectionDb, 'id_user', 'users', 'id', null);
            $sqlUser = $connectionDb->prepare("INSERT INTO `users` (`id_user`, `nombre`, `email`, `password_users`) VALUES (?, ?, ?, ?)");
            return $sqlUser->execute(array($id_user, $name, $email, $password));
        }
    }
}












