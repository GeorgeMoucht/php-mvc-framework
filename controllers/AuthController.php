<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

/**
 * Class AuthController
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/controllers;
*/

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $this->setLayout('auth');
        if($request->isPost()) {
            return 'Handle submitted data';
        }
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        if($request->isPost()) {
            return 'Handle submitted data';
        }
        return $this->render('register');
    }

}