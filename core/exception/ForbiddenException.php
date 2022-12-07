<?php
/**
 * Class ForbiddenException
 * 
 * This class is responsible for the routing of the application routes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/
namespace app\core\exception;


// \Exception class is a build-in class of php that handle basic exceptions.
class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = 'No permission to access this part of the website.';
}

?>