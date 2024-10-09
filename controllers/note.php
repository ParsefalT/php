<?php
$config = require("config.php");

$db = new DataBase($config["database"]);


$heading = "Note";
$note = $db->query("select * from notes where id = :id",[":id"=> $_GET["id"]])->fetch(PDO::FETCH_ASSOC);

// dd($notes);

require "views/note.view.php";