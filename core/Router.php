<?php

namespace app\core;

/**
 * Class Router
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
 * @param \app\core\Request $request
 * @param \app\core\Response $response
*/

class Router
{
    public Response $response;
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

    public function __construct(Request $request, Response $response)
    {
        //Initialize request object.
        $this->request= $request;
        $this->response = $response;
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
            $this->response->setStatusCode(404);
            return "Not found";
        }
        
        //Execute the callback function.
        if(is_string($callback))
        {
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        // include_once Application::$ROOT_DIR."/views/$view.php";
    }

    public function layoutContent()
    {
        ob_start(); //Start output cashing and we can remove the {{content}} string and replace it with layout
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();

    }

    protected function renderOnlyView($view)
    {
        ob_start(); //Start output cashing and we can remove the {{content}} string and replace it with layout
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();

    }
}


?>