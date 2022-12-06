<?php

namespace app\core\form;
use app\core\Model;
/**
 * Class Field
 * 
 * @author GeorgeMoucht <georgemoucht@gmail.com>
 * @package app/core/form;
 * @param string $attribute
 * @param \app\core\Model $model
*/

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    
    public string $type;
    public Model $model;
    public string $attribute;

    public function __construct(Model $model , string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="field-group">
                <input type="%s" placeholder="%s"  name="%s" value="%s" class="form-input %s">
                <div class="invalid-message">
                    %s
                </div>
            </div>
        ', 
            $this->type,
            $this->model->textPlaceHolder($this->attribute),
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

}

?>