<?php

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;

require_once __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);  //load .env file into the application
$dotenv->load();

ini_set('display_errors', 1); error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

$config = [
    'db' => [ // Values dsn/user/password comming from the .env file using vlucas/phpdotenv package.
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);   //create the application and pass project root directory


$app->db->applyMigrations();

?>