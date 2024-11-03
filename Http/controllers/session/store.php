<?php
use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    $auth = new Authenticator();

    $auth->attempt($email, $password);
    
    if($auth->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email', 'not matching something');
} 

Session::flash('errors', $form->errors());


redirect('/login');
