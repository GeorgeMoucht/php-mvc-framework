<?php

namespace app\models;
// use app\core\Model;
use app\core\DbModel;

/**
 * Class RegisterModel
 * 
 * Model data class of user on register
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/models;
*/

class User extends DbModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return 'users';
        //Explain:
            //By returning "users" string, we are mapping this User class for the users table in our database.
    }

    public function attributes(): array
    {
        // return [email, firstname, lastname, password];
        return ['firstname','lastname','email','password', 'status'];
    }

    public function save()
    {
        $this->status= self::STATUS_INACTIVE;
        $this->password = password_hash($this->password , PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED,],
            'lastname' => [self::RULE_REQUIRED,],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH , 'match' => 'password']],


        ];
    }

    public function __toString()
    {
        return '1';
    }

}

?>