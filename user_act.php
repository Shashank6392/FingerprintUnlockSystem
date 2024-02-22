<?php
include("connect.php");

header('Content-Type: application/json'); // Set response content type to JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $status = $_POST["status"];

    // Prepare and bind parameters to avoid SQL injection
    $stmt = $conn->prepare("UPDATE `users` SET `status` = ? WHERE `username` = ?");
    $stmt->bind_param("ss", $status, $username);

    // Execute the prepared statement
    if ($stmt->execute()) {
        $response = array(
            "success" => true,
            "message" => "User status updated successfully"
        );
    } else {
        $response = array(
            "success" => false,
            "message" => "Error updating user status: " . $stmt->error
        );
    }

    // Close the prepared statement
    $stmt->close();

    // Output the JSON response
    echo json_encode($response);
}
?>
