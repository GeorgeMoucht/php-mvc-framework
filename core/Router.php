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
 * @param \app\controllers\AuthController
*/
define('CSSPATH' , dirname(__DIR__). '/style/');

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

    //Explain of get/post functions:\
        //Get the current path and initialize routes array.
        //The first component of the array is REQUEST_METHOD,
        //And the second is REQUEST_URI variables from global var $_SERVER.
    //
    public function get($path , $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path , $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    //resolve for get or for post
    public function resolve()
    {
        $path = $this->request->getPath();  //Get current path
        $method = $this->request->method();  //Get current method
        $callback = $this->routes[$method][$path] ?? false; //build routes array

        //If callback doesn't exist return Not found (404 page)
        if($callback === false)
        {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        //Execute the callback function.
        if(is_string($callback))
        {
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            /** @var \app\core\Controller $controller */
            $controller = new $callback[0]();

            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware)
            {
                $middleware->execute();
            }
        }
        // Test the callback:
            // echo "<pre>";
            // var_dump($callback);
            // echo "</pre>";
            // exit;
        return call_user_func($callback, $this->request , $this->response);
    }

    public function renderView($view,$params = [])
    {
        $layoutContent = $this->layoutContent($view);
        $viewContent = $this->renderOnlyView($view,$params);
        return str_replace('{{content}}', $viewContent , $layoutContent);
    }

    public function layoutContent($view)
    {
        //TODO:
            //Render layout css file.
        $layout = Application::$app->layout;
        if(Application::$app->controller)
        {
            //if controller is null, declared as 'main' from Application
            $layout = Application::$app->controller->layout;
        }
        ob_start(); //Start output cashing and we can remove the {{content}} string and replace it with layout
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();

    }

    protected function renderOnlyView($view,$params)
    {
        //TODO:
            // render view css file.
        foreach ($params as $key => $value) {
            //if this evaluates as name, this will be evaluated as variable
            $$key = $value;
        }
        ob_start(); //Start output cashing and we can remove the {{content}} string and replace it with layout
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();

    }
}


?>