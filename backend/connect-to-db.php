<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'chat');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'chat');
define('DB_PORT', '3306');

try {
    $handler = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    $handler->query('SET CHARACTER SET utf8');
} catch (Exception $e) {
    echo '<h1>Service unavailable</h1>';
    echo '<br />';
    echo '<h2>Error Info :'.$e->getMessage().'</h2>';
    exit();
}
