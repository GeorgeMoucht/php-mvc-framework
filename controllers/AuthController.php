<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

/**
 * Class AuthController
 * 
 * This class authenicate users data.
 *  
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/controllers;
*/

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if($request->isPost()) {
            return 'Handle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $user = new User();   //Create the instance of the User model.
        if($request->isPost()) {
            $user->loadData($request->getBody());

            
            if($user->validate() && $user->save()) {
                return 'Success';
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

}