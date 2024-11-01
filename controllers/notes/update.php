<?php

use Core\App;
use Core\DataBase;
use Core\Validator;

$db = App::resolve(DataBase::class);
$errors = [];
$currentUserId = 1;

// where user_id = :user and ...
$note = $db->query("select * from notes where id = :id",[
    // ":user" => 1,
    ":id"=> $_POST["id"]]
    )->findOrFail();

// dd($notes);

authorized($note['user_id'] !== $currentUserId);


if(!Validator::string($_POST['body'], 1, 60)) {
    $errors['body'] = "A body is required and no more than 60 characters";
}

if(count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'edit',
        'errors' => $errors,
        'note' => $note
    ]);

}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');
die();