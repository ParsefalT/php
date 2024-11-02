<?php
use Core\App;
use Core\DataBase;

$db = App::resolve(DataBase::class);

$currentUserId = 1;

// where user_id = :user and ...
$note = $db->query("select * from notes where id = :id",[
    // ":user" => 1,
    ":id"=> $_GET["id"]]
    )->findOrFail();

// dd($notes);

authorized($note['user_id'] !== $currentUserId);


view('notes/edit.view.php', [
    'heading' => "edit",
    'errors' => [],
    'note' => $note
]);