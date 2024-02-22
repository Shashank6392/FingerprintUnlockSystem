<?php
// login.php
include("connect.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user details from the database
$qry = "SELECT * FROM users WHERE username = '$username'";
$raw = mysqli_query($conn, $qry);
$count = mysqli_num_rows($raw);

if ($count > 0) {
    // User found, fetch the stored hashed password
    $user = mysqli_fetch_assoc($raw);
    $storedHashedPassword = $user['password'];

    // Verify the entered password against the stored hashed password
    if (password_verify($password, $storedHashedPassword)) {
        // Password is correct, send success message
        $response['message'] = "Login successful";
    } else {
        // Password is incorrect, send failure message
        $response['message'] = "Login failed";
    }
} else {
    // No matching user found, send failure message
    $response['message'] = "Login failed";
}

echo json_encode($response);
?>
