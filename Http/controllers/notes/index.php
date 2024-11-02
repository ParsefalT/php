<?php
use Core\App;
use Core\DataBase;

$db = App::resolve(DataBase::class);

$notes = $db->query("select * from notes where user_id = :id",[":id"=>1])->getAll(PDO::FETCH_ASSOC);

// dd($notes);

view("notes/index.view.php", [
    'heading' => 'My notes',
    'notes' => $notes
]);