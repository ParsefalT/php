<?php
use Core\App;
use Core\DataBase;
use Core\Validator;

$db = App::resolve(DataBase::class);

$email = $_POST['email'];
$password = $_POST['password'];

if(!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email";
}

if(!Validator::string($password, 6, 22)) {
    $errors['password'] = 'type correct your password(6 - 22)';
}

if (!empty($errors)) {
    return view("session/create.view.php", [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {
    if(password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);
        header('location: /');
        exit();
    } 
}
