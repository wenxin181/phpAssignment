<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputValid
 *
 * @author Acer
 */
class InputValid {

    public $Inputpatterns = array(
        'words' => '[\p{L}\s]+',
        'tel' => '[0-9]{3}+-[0-9]{7}',
        'email' => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
    );
    public $errors = array();

    function fieldName($name) {
        $this->name = $name;
        return $this;
    }

    public function fieldValue($value) {

        $this->value = $value;
        return $this;
    }

    function InputPattern($name) {

        if ($name == 'array') {

            if (!is_array($this->value)) {
                $this->errors[] = 'Invalid Input for this ' . $this->name;
            }
        } else {

            $regex = '/^(' . $this->Inputpatterns[$name] . ')$/u';
            if ($this->value != '' && !preg_match($regex, $this->value)) {
                $this->errors[] = ' Invalid Input for this ' . $this->name;
            }
        }
        return $this;
    }

    function file($value) {

        $this->file = $value;
        return $this;
    }

    function required() {

        if ((isset($this->file) && $this->file['error'] == 4) || ($this->value == '' || $this->value == null)) {
            $this->errors[] = 'Cannot Be Blank ' . $this->name;
        }
        return $this;
    }

    public function isSuccess() {
        if (empty($this->errors)) {
            return true;
        }
    }

    public function getErrors() {
        if (!$this->isSuccess()) {
            return $this->errors;
        }
    }

    public function displayErrors() {

        $html = '<ul>';
        foreach ($this->getErrors() as $error) {
            $html .= '<li>' . $error . '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    function validateNumber($value) {
        if (filter_var($value, FILTER_VALIDATE_INT)) {
            return true;
        }
    }

    function validatePrice($value) {
        if (filter_var($value, FILTER_VALIDATE_FLOAT)) {
            return true;
        }
    }

function minValue($length) {

        if (is_string($this->value)) {
            if ($this->value < $length) {
                $this->errors[] = 'Invalid';
            }
        }
        return $this;
    }

    function maxValue($length) {

        if (is_string($this->value)) {
            if ($this->value > $length) {
                $this->errors[] = 'Invalid';
            }
        }
        return $this;
    }

    function emailValidate($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }
}
