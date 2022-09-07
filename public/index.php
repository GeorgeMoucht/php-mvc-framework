<?php
//First runtime script by users.
//All requests will be handled by this script.

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;

ini_set('display_errors', 1); error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);;

$app = new Application(dirname(__DIR__));   //create the application and pass project root directory

//Map all the URL's that we have in our application.

// Homepage
$app->router->get('/', [SiteController::class, 'home']);

// Contact
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


//  Login
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

//  Register
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();

?>