<?php
use Core\App;
use Core\Authenticator;
use Core\DataBase;
use Http\Forms\LoginForm;

$db = App::resolve(DataBase::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view("session/create.view.php", [
        'errors' => $form->errors()
    ]);
}

$auth = new Authenticator();


$auth->attempt($email, $password);

if($auth->attempt($email, $password)) {
    redirect('/');
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'wtf'
    ]
]);
