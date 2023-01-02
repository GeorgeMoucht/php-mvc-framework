<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;

use app\models\LoginForm;
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
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request , Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()) {
            // return 'Handle submitted data';
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login' , [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();   //Create the instance of the User model.
        if($request->isPost()) {
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Successfully registered');
                Application::$app->response->redirect('/');
                exit;
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

    public function logout(Request $request , Response $response)
    {
        Application::$app->logout();
        // $response->redirect('/');
        return $this->render('home');
    }


}