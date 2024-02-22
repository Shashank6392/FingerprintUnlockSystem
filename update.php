<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "fus";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$buttonClicked = $_POST['button'];

if ($buttonClicked === "A") {
    // Update the database for Button A
    $sql = "UPDATE users SET pass = 'Y' WHERE username = 'Azad';";
} elseif ($buttonClicked === "B") {
    // Update the database for Button B
    $sql = "UPDATE users SET pass = 'N' WHERE username = 'Azad';";
} else {
    echo "Invalid button click.";
    exit();
}

if ($conn->query($sql) === TRUE) {
    echo "Database updated successfully for Button " . $buttonClicked;
} else {
    echo "Error updating database: " . $conn->error;
}

$conn->close();
?>
