<?php

namespace App\Core;

class Router
{
    public function run()
    {
        $url = $_GET['url'] ?? 'login';
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);

        /* Definición de rutas para los controladores */
        switch ($url) {
            case 'login':
                $controller = new \App\Controllers\AuthController();
                $controller->login();
                break;
            case 'register':
                $controller = new \App\Controllers\AuthController();
                $controller->register();
                break;
            case 'dashboard':
                $controller = new \App\Controllers\AuthController();
                $controller->dashboard();
                break;
            case 'profile':
                $controller = new \App\Controllers\ProfileController();
                $controller->showProfile();
                break;
            case 'logout':
                $controller = new \App\Controllers\AuthController();
                $controller->logout();
                break;
            default:
                echo "Page not found";
                break;
        }
    }
}
