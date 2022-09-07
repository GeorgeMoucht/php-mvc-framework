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
    public Router $router;
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }


    public function run()
    {
        $this->router->resolve();
    }

}



?>