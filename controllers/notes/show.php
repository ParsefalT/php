<?php
use Core\DataBase;

$config = require base_path("config.php");

$db = new DataBase($config["database"]);

$currentUserId = 1;

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $note = $db->query("select * from notes where id = :id",[
        // ":user" => 1,
        ":id"=> $_GET["id"]]
        )->findOrFail();

    // dd($notes);

    authorized($note['user_id'] !== $currentUserId);
    
    $db->query("delete from notes where id = :id",[":id" => $_GET['id']]);
    header('location: /notes');
    exit();
} else {
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
}