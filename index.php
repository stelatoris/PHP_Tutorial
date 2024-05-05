<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';
// Connect to the database, and execute a query.

$db = new Database($config['database']);

$id = $_GET['id'];
$query = 'select * from posts where id = :id';

// connect to our MySQL database
$posts = $db->query($query, [':id'=>$id])->fetch();

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }

dd($posts);
