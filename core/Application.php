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
    public Router $router;
    public Response $response;
    public Request $request;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }


    public function run()
    {
        echo $this->router->resolve();
    }

}



?>