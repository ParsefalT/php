<?php
use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attr = [
    'email' => $_POST['email'],
    "password" => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt($attr['email'], $attr['password']);

if(!$signedIn) {
    $form->error('email', 'not matching something')->throw();
}
redirect('/');
