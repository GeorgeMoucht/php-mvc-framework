<?php

namespace app\helpers;

use app\core\Application;
/**
 * Class Time
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core/helpers;
*/

class Time
{
    public string $date = '';

    public function __construct()
    {
        $date = Application::$app->user->getCreatedDate();
        var_dump($date);
        // exit;
    }
}

?>