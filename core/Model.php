<?php

namespace app\core;
/**
 * Class Model
 * 
 * Since Model class is abstract, we can't have an object of  this class.
 * Only child classes can use this class by extending it.
 * So Model have global functions for child classes like RegisterModel.php.
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core;
*/

//We cant have an instance of this model. Only child classes use this model class.
abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    
    public function loadData($data)
    {
        foreach($data as $key => $value) {
            //Assign data in the property of the model
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    //Every child class must implement a rule function.
    abstract public function rules(): array;

    //Array that storing all errors from data rules child method.
    public array $errors = [];

    public function labels(): array 
    {
        return [];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }


    //Validate function loop throw all rules of child class and check if all data validate the rules.
    public function validate()
    {

        foreach($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute}; // if the value exist, then save it.
            foreach($rules as $rule) {
                $ruleName = $rule;
                //Check if value it is an array and not a string. Check RegisterModel rules for example.
                if(!is_string($ruleName)) {
                    $ruleName = $rule[0]; //Save the first rule name
                }
                //Check if value is blank or null
                if($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                }
                //Checks if the value is a valid email address
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, self::RULE_EMAIL);
                }
                //Check minimum length
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorForRule($attribute, self::RULE_MIN, $rule);
                }
                // Check maximum length
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorForRule($attribute, self::RULE_MAX , $rule);
                }
                //Check match rule on value
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $rule['match'] = $this->getLabel($rule['match']);
                    $this->addErrorForRule($attribute, self::RULE_MATCH, $rule);
                }

                //Check uniqueness of value
                if($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
                    $statement->bindValue(":attr",$value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if($record) //means we have an unique error.
                    {
                        $this->addErrorForRule($attribute , self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]);
                    }
                }
            }
        }

        return empty($this->errors);
    }

    //Add the error in the errors array.
    //Params need to pass the error parameters
    private function addErrorForRule(string $attribute , string $rule , $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        //Replace $key with the value of the rule
        foreach($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }


    public function addError(string $attribute , string $message)
    {
        $this->errors[$attribute][] = $message;
    }


    //Basic error messages rules to print them out on every child "rule" method
    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Minimum length of the field must be at {min}',
            self::RULE_MAX => 'Maximum length of the field must be at {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with this {field} already exist. Please try again',
        ];
    }

    //Check if this model have any error to echo on the view.
    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }


    public function textPlaceHolder($attribute)
    {
        $baseString = 'Enter your';
        return $baseString.' '.$attribute;
    }
}


?>