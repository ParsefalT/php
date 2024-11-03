<?php
namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function __construct(public array $attr) {
        if(!Validator::email($attr['email'])) {
            $this->errors['email'] = "Please provide a valid email";
        }

        if(!Validator::string($attr['password'], 1)) {
            $this->errors['password'] = 'type correct your password(6 - 22)';
        }
    }
    
    public static function validate($attr) {
        $instance = new static($attr);

        return $instance->field() ? $instance->throw() : $instance;
    }

    public function throw() {
        ValidationException::throw($this->errors(), $this->attr);
    }
    
    public function field() {        
        return count($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $msg) {
        $this->errors[$field] = $msg;
        return $this;
    }
}