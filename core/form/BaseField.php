<?php

namespace app\core\form;

abstract class BaseField
{
    public $model;
    public $attribute;

    abstract public function renderInput();

    public function __construct($model, $attribute) {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-group mb-3">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ',
            $this->model->getLabel($this->attribute), 
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );

    }
}
