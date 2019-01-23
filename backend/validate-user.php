<?php
require 'connect-to-db.php';
session_start();
$get_username = $_POST['username'];
$get_password = $_POST['password'];
$login_query = 'SELECT id,username,password FROM user WHERE username = ?';
$login_stmt = $handler->stmt_init();
if ($login_stmt->prepare($login_query)) {
    $login_stmt->bind_param('s', $get_username);
    $login_stmt->execute();
    $login_stmt->bind_result($id, $username, $password);
    $login_result = $login_stmt->get_result();
    while ($login_row = $login_result->fetch_assoc()) {
        $login_username = $login_row['username'];
        $login_id = $login_row['id'];
    }
} else {
    echo 'Failure';
    header('Location: ../login.html');
    die();
}

if ($login_result->num_rows != 0) {
    $_SESSION['username'] = $login_username;
    $_SESSION['user_id'] = $login_id;
    header('Location: ../index.php');
} else {
    echo 'Failure';
    header('Location: ../login.html');
}
