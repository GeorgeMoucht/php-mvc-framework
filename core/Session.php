<?php
namespace app\core;
/**
 * Class Session
 * 
 * All about session array.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/

class Session
{

    protected const FLASH_KEY = 'flash_messages';

    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach($flashMessages as $key => &$flashMessage)
        {
            //Mark flash message to be removed on destruction of Session object.
            $flashMessage['remove'] = true;
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
        // echo '<pre>';
        // var_dump($_SESSION[self::FLASH_KEY]);
        // echo '</pre>';

    }

    //Set flash message to be removed on destruction of Session object
    public function setFlash($key,$message)
    {
        //Example:
            //$_SESSION['flash_messages'][$key] = $message;
        
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    public function getFlash($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    //Set a value on $_SESSION array.
    public function set($key , $value)
    {
        $_SESSION[$key] = $value;
    }

    //Get the value from $_SESSION array. If doesn't exists return false.
    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    //Remove a value from $_SESSION array.
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function __destruct()
    {
        //Loop over marked SESSION flash_messages and remove them.
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach($flashMessages as $key => &$flashMessage) {
            if($flashMessage['remove'])
            {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}
?>