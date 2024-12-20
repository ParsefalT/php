<?php
use Core\App;
use Core\Validator;
use Core\DataBase;

$db = App::resolve(DataBase::class);

$errors = [];

if(!Validator::string($_POST['body'], 1, 60)) {
    $errors['body'] = "A body is required and no more than 60 characters";
}

if(!empty($errors)) {
    view("notes/create.view.php", [
        'heading' => 'create-note',
        'errors' => $errors
    ]);
}

$db->query('insert into notes(body,user_id) values(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /notes');
die();
