<?php

$config = require 'config.php';

$db = new Database($config['database']);

$heading = "Note";
$currentUserId = 2; //user id hard coded for testing

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $id
])->fetch();

if (!$note) {
    abort();
}

if ($note['user_id'] != $currentUserId) {
    abort(Response::FORBIDDEN);
}


// dd($notes);

require "views/note.view.php";
