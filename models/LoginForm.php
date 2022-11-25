<?php

namespace app\models;
use app\core\Application;
use app\core\Model;

/**
 * Class LoginForm
 * 
 * Model data class of user on register
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/models;
*/


class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => 'Password',
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user)  //if user doesn't exist into database
        {
            $this->addError('email' , 'User does not exist with this email.');
            return false;
        }
        if(!password_verify($this->password, $user->password))
        {
            $this->addError('email' , 'Given password is incorrect.');
            return false;
        }

        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';
        // exit;
        return Application::$app->login($user);
    }

}

?>