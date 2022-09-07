<?php

/**
 * Class SiteController
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/

namespace app\controllers;
use app\core\Application;

class SiteController
{

    public function home()
    {
        $params = [
            'name' => "MyName",
        ];
        
        return Application::$app->router->renderView('home' , $params);
    }

    public function contact()
    {
        //render contact form
        return Application::$app->router->renderView('contact');
    }
    public function handleContact()
    {
        return 'Handling Submitted data';
    }
}

?>