<?php
use Core\App;
use Core\DataBase;

$db = App::resolve(DataBase::class);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id",[
    // ":user" => 1,
    ":id"=> $_POST["id"]]
)->findOrFail();

authorized($note['user_id'] !== $currentUserId);
    
$db->query("delete from notes where id = :id",[":id" => $_GET['id']]);
header('location: /notes');
exit();