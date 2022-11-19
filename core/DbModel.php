<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;
    
    // Retrive any model attributes and save them in the database
    public function save()
    {
        $tableName = $this->tableName();
        
        $attributes = $this->attributes();  //all columns of the table we want to make changes.

        //Explain of params:
            //Return an array of all parameters having the symbol ":" infront of them
            //so we can later automatically bind them.
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") 
                                    VALUES (".implode(',',$params).")");

        // echo '<pre>';
        // var_dump($statement , $params, $attributes);
        // echo '</pre>';
        // exit;
        foreach ($attributes as $attribute)
        {
            $statement->bindValue(":$attribute" , $this->{$attribute});

        }
        $statement->execute();
        return true;
    }

    //Atomation for returning a pdo prepare function from the Application.
    public static function prepare($sql)
    {
        return  Application::$app->db->pdo->prepare($sql);

    }
}

?>