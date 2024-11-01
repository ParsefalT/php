<?php
use Core\DataBase;

$config = require base_path("config.php");

$db = new DataBase($config["database"]);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id",[
    // ":user" => 1,
    ":id"=> $_POST["id"]]
)->findOrFail();

authorized($note['user_id'] !== $currentUserId);
    
$db->query("delete from notes where id = :id",[":id" => $_GET['id']]);
header('location: /notes');
exit();