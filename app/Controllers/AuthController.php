<?php

namespace App\Controllers;

use App\Core\ApiClient;

class AuthController{
    
    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            /* Consultar la API para auteticar al usuario */
            $api = new ApiClient();
            $response = $api->post('auth/login', [
                'email' => $email,
                'password' => $password
            ]);

            if ($response['tipo'] === true) { 
                $_SESSION['token'] = $response['token'];
                $_SESSION['usuario'] = $response['usuario'];

                header('Location: /test/public/dashboard');
                exit();
            }else {
                $error = $response['message'] ?? 'Error al autenticar el usuario.';
                require_once '../app/Views/auth/login.php';
            }
        }else {
            require_once '../app/Views/auth/login.php';
        }
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            /* Consultar API para registrar usuario */
            $api = new ApiClient();
            $response = $api->post('auth/register', [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);

            /* Verificacion que las contraseñas coincidan */
            if ($password !== $confirmPassword) {
                $error = "Las contraseñas no coinciden.";
                require_once '../app/Views/auth/register.php';
                return;
            }

            if (isset($response['tipo']) && $response['tipo'] === true) {
                # code...
            }else {
                $error = $response['message'] ?? 'Error al registrar el usuario.';
                require_once '../app/Views/auth/register.php';
            }
        }else {
            require_once '../app/Views/auth/register.php';
        }
    }

    public function dashboard()
    {
        /* session_start(); */

        if (!isset($_SESSION['token'])) {
            header('Location: /test/public/login');
            exit();
        }

        require_once '../app/Views/auth/dashboard.php';
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('Location: /test/public/login');
        exit();
    }
}