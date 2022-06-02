<?php

namespace App\Controller;

use MF\Action;
use App\Model\User;

class IndexController extends Action
{
    public function signIn()
    {
        $this->render('signIn', 'IndexLayout');
    }

    public function signUp()
    {
        $this->render('signUp', 'IndexLayout');
    }

    public function save()
    {
        $user = new User;

        $user->__set('username', $_POST['username']);
        $user->__set('pass',md5($_POST['pass']));
        $user->__set('email', $_POST['email']);

        header('location: ' . ($user->save() ? '/' : '/signUp'));
    }
}
