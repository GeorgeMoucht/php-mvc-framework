<?php
//First runtime script by users.
//All requests will be handled by this script.

require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$app = new Application();

//Map all the URL's that we have in our application.

// Homepage
$app->router->get('/', function(){
    return 'Hello  world';
});

// Contact
$app->router->get('/contact', function(){
    return 'Contact';
});


$app->run();

?>