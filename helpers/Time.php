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
    public string $date;
    // public string $created_at;

    public function __construct($created_at)
    {
        $this->date = $created_at;
        // var_dump($this-> date);
    }
}

?>