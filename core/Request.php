<?php

namespace app\core;

/**
 * Class Request
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/


class Request
{

    public function __construct()
    {
    }
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/'; //if REQUEST_URI is empty assume  === '/'.
        $position = strpos($path, '?');         //Find position of '?' in the path.

        if($position === false) {   //If '?' not means $position is false.
            //Simply return full path   
            return $path;
        }
        //else return $path until "?" symbol position.
        return  substr($path, 0, $position);

        var_dump($position);
        exit;
    }


    public function method()    // Returns the requested method from the currnet request [POST/GET]
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function isGet() //Checks if the request is a GET request
    {
    return $this->method() === 'get';
    }

    public function isPost() //Checks if the request is a POST request
    {
    return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if($this->method() === 'get') {
            foreach($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->method() === 'post') {
            foreach($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

}

?>