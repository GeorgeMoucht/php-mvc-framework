<?php

namespace app\models;
// use app\core\Model;
// use app\core\DbModel;
use app\core\UserModel;
use app\helpers\Time;

/**
 * Class RegisterModel
 * 
 * Model data class of user on register
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/models;
*/

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $username = '';
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $city = '';
    public string $country = '';
    public string $interests = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';
    public string $created_at = '';
    public Time $time;

    public static function tableName(): string
    {
        return 'users';
        //Explain:
            //By returning "users" string, we are mapping this User class for the users table in our database.
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        // return [email, firstname, lastna me, password];
        return ['firstname','lastname','email','password', 'status'];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm your password',

        ];
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
            'username' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL , [self::RULE_UNIQUE , 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH , 'match' => 'password']],

        ];
    }

    public function __toString()
    {
        return '1';
    }

    public function getDisplayName(): string
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function getDisplayEmail(): string
    {
        return $this->email;
    }

    public function getDisplayCountry(): string
    {
        $country = $this->country;
        if($country == null)
        {
            return "--";
        }
        else
        {
            return $country;
        }
    }

    public function getDisplayCity(): string
    {
        $city = $this->city;
        if($city == null)
        {
            return "--";
        }
        else
        {
            return $city;
        }
    }

    public function getDisplayInterests(): string
    {
        $interests = $this->interests;
        if($interests == null)
        {
            return "--";
        }
        else
        {
            return $interests;
        }
    }

    public function getDisplayCreatedDate(): string
    {
        // var_dump(date("Y/m/d"));
        // var_dump(gettype($this->created_at));
        // var_dump($this->created_at);
        // $date = date('m/d/Y h:i:s a', time());
        // var_dump($date);
        $time = new Time;
        // return $this->created_at;
        return "hi";
    }

    public function getCreatedDate(): string
    {
        return $this->created_at;
    }
}

?>