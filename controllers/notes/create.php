<?php
require base_path('Validator.php');
$config = require base_path("config.php");
$db = new DataBase($config["database"]);

$errors = [];

// $heading = 'create-note';


if($_SERVER['REQUEST_METHOD'] === 'POST') {


    if(!Validator::string($_POST['body'], 1, 60)) {
        $errors['body'] = "A body is required and no more than 60 characters";
    }

    if(empty($errors)) {
        $db->query('insert into notes(body,user_id) values(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

    // dd($_POST);
}

view("notes/create.view.php", [
    'heading' => 'create-note',
    'errors' => $errors
]);