<?php

/**
 * Class SiteController
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/controllers;
*/

namespace app\controllers;
use app\core\Controller;
use app\core\Application;
use app\core\Request;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name' => "MyName",
        ];
        
        return $this->render('home' , $params);
    }

    public function contact()
    {
        //render contact form
        return $this->render('contact');
    }

    //Handle Posted data
    public function handleContact(Request $request)
    {
        //Retrive user data
        $body = $request->getBody();

        return 'Handling Submitted data';
    }
}

?>