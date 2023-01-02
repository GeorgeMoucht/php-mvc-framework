<?php
//First runtime script by users.
//All requests will be handled by this script.

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


// echo phpinfo();
// exit;

ini_set('display_errors', 1); error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);;

$config = [
    'userClass' => \app\models\User::class,
    'db' => [ // Values dsn/user/password comming from the .env file using vlucas/phpdotenv package.
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);   //create the application and pass project root directory
 
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

//Logout
$app->router->get('/logout', [AuthController::class, 'logout']);

//Profile
$app->router->get('/profile', [SiteController::class, 'profile']);

$app->run();

?>