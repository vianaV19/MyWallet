<?php

namespace App\Controller;

use MF\Action;
use App\Model\User;

class AuthController extends Action
{
    public function auth()
    {
        $user = new User;
        $user->__set('email', $_POST['email']);
        $user->__set('pass', $_POST['pass']);

        $user = $user->auth();

        session_start();

        if ($user) {

            $_SESSION['username'] = $user->username;
            $_SESSION['id'] = $user->id;
            $_SESSION['email'] = $user->email;
            $_SESSION['money'] = $user->money;
            $_SESSION['auth'] =  True;

            header('location: /balance');

        } else {

            header('location: /');
        }
    }
}
