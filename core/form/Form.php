<?php

namespace app\core\form;
// use app\core\model\Model;
/**
 * Class Form
 * 
 * Form class auto generate forms with given attributes.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core/form;
*/

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field($model , $attribute)
    {
        return new Field($model , $attribute);
    }


}

?>