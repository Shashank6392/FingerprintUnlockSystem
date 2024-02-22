<?php
    include("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["webcode"])) {
        $webcode = $_POST["webcode"]; // Retrieve the web code sent via AJAX
        
        // Insert the received web code into the database
        $sql = "INSERT INTO web_conn (webcode, date_time) VALUES ('$webcode', NOW())";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
