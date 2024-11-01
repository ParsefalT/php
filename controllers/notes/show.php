<?php
$config = require base_path("config.php");

$db = new DataBase($config["database"]);


// $heading = "Note";
$currentUserId = 1;


// where user_id = :user and ...
$note = $db->query("select * from notes where id = :id",[
    // ":user" => 1,
    ":id"=> $_GET["id"]]
    )->findOrFail();

// dd($notes);

authorized($note['user_id'] !== $currentUserId);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note,
    'currentUserId' => $currentUserId
]);