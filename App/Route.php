<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

    protected function init_routes()
    {
        $this->routes['signIn'] = [
            'url' => '/',
            'controller' => 'indexController',
            'action' => 'signIn'
        ];

        $this->routes['signUp'] = [
            'url' => '/signUp',
            'controller' => 'indexController',
            'action' => 'signUp'
        ];

        $this->routes['auth'] = [
            'url' => '/auth',
            'controller' => 'authController',
            'action' => 'auth'
        ];

        $this->routes['balance'] = [
            'url' => '/balance',
            'controller' => 'appController',
            'action' => 'balance'
        ];

        $this->routes['profile'] = [
            'url' => '/profile',
            'controller' => 'appController',
            'action' => 'profile'
        ];

        $this->routes['sair'] = [
            'url' => '/sair',
            'controller' => 'appController',
            'action' => 'sair'
        ];
        
        $this->routes['save'] = [
            'url' => '/save',
            'controller' => 'indexController',
            'action' => 'save'
        ];
    }
}
