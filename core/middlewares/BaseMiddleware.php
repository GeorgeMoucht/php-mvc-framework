<?php

namespace app\core\middlewares;
/**
 * Class BaseMiddleware
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author geortrim <trimisg5@gmail.com>
 * @package app/core/middlewares;
*/
abstract class BaseMiddleware
{
    abstract public function execute();
}


?>