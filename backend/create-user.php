<?php
require 'connect-to-db.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    $add_username = $_POST['username'];
    $add_password = $_POST['password'];
    $add_admin = '0';
    $create_query = 'INSERT INTO user (username, password, isAdmin) VALUES (?,?,?)';
    $create_stmt = $handler->stmt_init();
    try {
        $create_stmt->prepare($create_query);
        $create_stmt->bind_param('sss', 
            $add_username, 
            $add_password, 
            $add_admin
        );
        $create_stmt->execute();
    } catch (Exception $e) {
        echo '<h1>Service unavailable</h1>';
        echo '<br />';
        echo '<h2>Error Info :'.$e->getMessage().'</h2>';
        exit();
    }
}

header('Location: ../login.html');
exit();
