<?php

/**
 * Class SiteController
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/

namespace app\core;
use app\core\middlewares\BaseMiddleware;

class Controller
{
    /**
     * Specify that $middlewares array is data type of class variables.
     * @var \app\core\middlewares\BaseMiddleware[]
    */
    protected array $middlewares = [];
    public string $layout = 'main'; //Save the layout to be used.
    public string $action = '';

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view,$params = [])
    {
        return Application::$app->router->renderView($view,$params);
    }

    // This function handle the restrict access of user.
    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}

?>