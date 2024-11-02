<?php
use Core\App;
use Core\DataBase;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

if(!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email";
}

if(!Validator::string($password, 6, 22)) {
    $errors['password'] = 'type correct your password(6 - 22)';
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
}

$db = App::resolve(DataBase::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {
    header('location: /registration');
} else {
    $db->query('insert into users(email,password) values(:email, :password)',[
        'email' => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);
    
    header('location: /');
    exit();
}

dd($result);