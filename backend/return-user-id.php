<?php 
require 'connect-to-db.php';
session_start();
echo $_SESSION['user_id'];
