<?php

namespace App\Controllers;

use App\Core\ApiClient;

class ProfileController
{

    public function showProfile()
    {
        $token = $_SESSION['token'];
        $api = new ApiClient();
        $response = $api->get('usuarios/', $token);

        if ($response['estado'] === true) {
            $user = $response;
            require_once '../app/Views/auth/profile.php';
        } else {
            echo "Error: " . $response['message'];
        }
    }
}
