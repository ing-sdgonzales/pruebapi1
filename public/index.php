<?php

require_once '../config/config.php';
require_once '../app/Controllers/AuthController.php';
require_once '../app/Controllers/ProfileController.php';
require_once '../app/Controllers/CvController.php';
require_once '../app/Core/Router.php';
require_once '../app/Core/ApiClient.php';

use App\Core\Router;

session_start();

/* Iniciar la app */
 $router = new Router();
 $router->run();