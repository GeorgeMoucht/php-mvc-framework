<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

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
        $registerModel = new RegisterModel();   //Create the instance of the RegisterModel.
        if($request->isPost()) {
            $registerModel->loadData($request->getBody());

            
            if($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

}