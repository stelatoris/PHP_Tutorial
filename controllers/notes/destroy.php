<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 2; //user id hard coded for testing

$id = $_GET['id'];



$note = $db->query('select * from notes where id = :id', [
    'id' => $id
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $id
]);

header('location: /notes');

exit();
