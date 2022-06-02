<?php

namespace App\Controller;

use MF\Action;
use App\Model\User;

class AppController extends Action
{
    public function balance()
    {
        $this->loginVerify();

        $this->render('balance', 'AppLayout');
    }

    public function profile()
    {
        $this->loginVerify();

        $this->view->error = 0;
        $this->view->alert = '';

        $action = isset($_GET['action']) ? $_GET['action'] : '';

        if (!empty($action)) {

            $user = new User;

            if ($action == 'update') {

                $user->__set('id', $_SESSION['id']);
                $user->__set('email', $_SESSION['email']);
                $user->__set('pass', md5($_POST['pass']));

                if ($user->auth()) {

                    $email = empty($_POST['email']) ? $_SESSION['email'] : $_POST['email'];
                    $username = empty($_POST['username']) ? $_SESSION['username'] : $_POST['username'];

                    $user->__set('username', $username);
                    $user->__set('email', $email);

                    if ($user->update()) {
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;

                        $this->view->alert = 'update';
                    } else {
                        $this->view->error = 2;
                    }
                }else{
                    $this->view->error = 3;
                }
            } else if ($action == 'delete') {
                $user->__set('email', $_SESSION['email']);
                $user->__set('pass', $_POST['pass']);
                $user->__set('id', $_SESSION['id']);

                if ($user->delete()) {
                    header('location: /');
                } else {
                    $this->view->error = 1;
                }
            }
        }

        $this->render('profile', 'AppLayout');
    }

    public function sair()
    {
        $this->loginVerify();

        session_unset();

        session_destroy();

        header('location: /');
    }

    private function loginVerify()
    {
        session_start();

        if (!isset($_SESSION['auth']) && !$_SESSION['auth']) {
            header('Location: /');
        }
    }
}
