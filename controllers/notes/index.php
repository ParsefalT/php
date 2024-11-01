<?php
$config = require base_path("config.php");

$db = new DataBase($config["database"]);


// $heading = "Notes";

$notes = $db->query("select * from notes where user_id = :id",[":id"=>1])->getAll(PDO::FETCH_ASSOC);

// dd($notes);

view("notes/index.view.php", [
    'heading' => 'My notes',
    'notes' => $notes
]);