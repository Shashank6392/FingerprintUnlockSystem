<?php
session_start(); // Start the session

$mysqli = new mysqli("localhost", "root", "", "fus");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare and execute the query
if ($stmt = $mysqli->prepare("SELECT username FROM web_conn WHERE webcode = ?")) {
    $webcode = $_POST['webcode']; // Sanitize and validate user input properly

    // Bind the parameter
    $stmt->bind_param("s", $webcode);

    // Execute the query
    $stmt->execute();

    // Process the result
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Store the username in session
            $_SESSION['username'] = $row['username'];
            // Use the username or store it for further usage
            $username = $_SESSION['username'];
            echo "Username: " . $username;
        }
    } else {
        echo "No user found for this webcode." . $webcode;
    }

    // Close the result set
    $result->close();
    
    // Close the statement
    $stmt->close();
} else {
    echo "Error in preparing the statement: " . $mysqli->error;
}

// Close the connection
$mysqli->close();
?>
