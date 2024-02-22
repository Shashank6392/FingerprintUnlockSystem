<?php
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
} else {
    echo "Guest"; // Or an appropriate placeholder if the username is not available
}
?>
