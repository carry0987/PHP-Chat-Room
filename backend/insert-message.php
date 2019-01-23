<?php
require 'connect-to-db.php';
session_start();
$userId = $_SESSION['user_id'];
$content = $_POST['message'];
$date_format = 'Y-m-d h:i:s';
$post_date = date($date_format, time());

$create_query = 'INSERT INTO message (time, sender_id, content) VALUES (?, ?, ?)';
$create_stmt = $handler->stmt_init();
try {
    $create_stmt->prepare($create_query);
    $create_stmt->bind_param('sss', 
        $post_date, 
        $userId, 
        $content
    );
    $create_stmt->execute();
} catch (Exception $e) {
    echo '<h1>Service unavailable</h1>';
    echo '<br />';
    echo '<h2>Error Info :'.$e->getMessage().'</h2>';
    exit();
}
