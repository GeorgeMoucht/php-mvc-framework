<?php
/**
 * Class Application
 * 
 * This class handle the runtime proccess of the application.
 * SESSION, Routing , Requests should be handled from this class.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/

namespace app\core;



class Application
{
    public static string $ROOT_DIR;

    public string $userClass;
    public Router $router;
    public Response $response;
    public Database $db;
    public Request $request;
    public Session $session;
    public ?Controller $controller = null;
    public string $layout = 'main';
    public static Application $app;
    public ?DbModel  $user; //with "?", we declare the variable only if exists.

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->session = new Session();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');

        //fetch user when navigating between pages.
        if ($primaryValue) 
        {
            $primaryKey = $this->userClass::primaryKey();   //get primary key of user.
            
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);  //fetch user.  
        }
        else
        {
            $this->user = null; //set user to nuill means user is not logged in yet.
        }
    }

    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    //save user into session to stay logged in.
    public function login(DbModel $user)
    {
        //save the ID into session table
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValueOfKey = $user->{$primaryKey};
        $this->session->set('user', $primaryValueOfKey);
        
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }    

    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function run()
    {
        echo $this->router->resolve();
    }

    public static function isGuest()
    {
        //Returns true if the user is a guest
        return !self::$app->user;
    }
}



?>