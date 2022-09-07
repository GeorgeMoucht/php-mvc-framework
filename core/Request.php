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


    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}

?>