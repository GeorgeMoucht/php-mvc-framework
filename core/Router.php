<?php

namespace app\core;

/**
 * Class Router
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/

class Router
{
    public Request $request;
    //Example of routes array:
        //$routes = [
            // 'get' => [
                // '/' => callback ,
                // '/contact' => callback
            // ],
            // 'post' => [
                // '/contact' => callback ,
            // ]
        // ];
    //
    protected array $routes = [];

    public function __construct(\app\core\Request $request)
    {
        //Initialize request object.
        $this->request= $request;
    }

    //Explain of get:\
        //Get the current path and initialize routes array.
        //The first component of the array is REQUEST_METHOD,
        //And the second is REQUEST_URI variables from global var $_SERVER.
    //
    public function get($path , $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    //resolve for get or for post
    public function resolve()
    {
        $path = $this->request->getPath();  //Get current path
        $method = $this->request->getMethod();  //Get current method
        $callback = $this->routes[$method][$path] ?? false; //build routes array
        
        //If callback doesn't exist return Not found (404 page)
        if($callback === false)
        {
            echo "Not found";
            exit;
        }
        
        //Execute the callback function.
        echo call_user_func($callback);
    }
}


?>