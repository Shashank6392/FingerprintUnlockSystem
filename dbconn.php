<?php
// Database connection setup
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'fus';

// Establishing a database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
