<?php
$heading = 'create-note';
require 'views/note-create.view.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($_POST);
}

