<?php
include("connect.php");
session_start(); // Start the session

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Password matches, store username in session
            $_SESSION['username'] = $username;

            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Login successful'));

            // Redirect to hello.php
            header("Location: hello.php");
            exit;
        } else {
            // Invalid username or password
            header('Content-Type: application/json');
            http_response_code(401); // Unauthorized
            echo json_encode(array('message' => 'Invalid username, password, or Account Deactivated'));
            exit;
        }
    } else {
        // User not found
        header('Content-Type: application/json');
        http_response_code(401); // Unauthorized
        echo json_encode(array('message' => 'Invalid username and password or Account Deactivated'));
        exit;
    }
}
?>
