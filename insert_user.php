<?php
include("connect.php");

header('Content-Type: application/json'); // Set response content type to JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $webcode = $_POST["webcode"];
    $username = $_POST["username"];

    // Prepare and bind parameters to avoid SQL injection
    $stmt = $conn->prepare("UPDATE `web_conn` SET `username`=?, `status`='Yes' WHERE `webcode`=?");
    $stmt->bind_param("ss", $username, $webcode);

    // Execute the prepared statement
    if ($stmt->execute()) {
        $response = array(
            "success" => true,
            "message" => "Web code updated successfully"
        );
    } else {
        $response = array(
            "success" => false,
            "message" => "Error updating web code: " . $stmt->error
        );
    }

    // Close the prepared statement
    $stmt->close();

    // Output the JSON response
    echo json_encode($response);
}
?>
