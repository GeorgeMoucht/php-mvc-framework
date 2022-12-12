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

    protected function iconPicker(string $attribute)
    {
        //TODO:
            // Through the $attribte we need to decide
            // which svg this form field will print.
            // Probably we will call this function directly
            // into constructor of this class.
        if($attribute == 'email')
        {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
          </svg>';
        }
        else if ($attribute == 'password')
        {
            return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
          </svg>';
        }
    }

    public function __toString()
    {
        return sprintf('
            <div class="field-group">
                <div class="icon-cnt">
                    %s
                </div>
                <input type="%s" placeholder="%s"  name="%s" value="%s" class="form-input %s">
                <div class="invalid-message">
                    %s
                </div>
            </div>
        ', 
            $this->iconPicker($this->attribute),
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