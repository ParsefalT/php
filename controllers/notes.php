<?php
$config = require("config.php");

$db = new DataBase($config["database"]);


$heading = "Notes";

$notes = $db->query("select * from notes where user_id = :id",[":id"=>1])->fetchAll(PDO::FETCH_ASSOC);

// dd($notes);

require "views/notes.view.php";