<?php
namespace Http\Forms;
use Core\Validator;

class LoginForm {
    protected $errors = [];
    
    public function validate($email, $password) {

        if(!Validator::email($email)) {
            $this->errors['email'] = "Please provide a valid email";
        }

        if(!Validator::string($password, 6, 22)) {
            $this->errors['password'] = 'type correct your password(6 - 22)';
        }

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }
}