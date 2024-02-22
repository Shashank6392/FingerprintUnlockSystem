<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            background-image: url(img/bg.jpg);
            width: 100%;
            height: 700px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .regBox {
            border: 2px solid #e17e7e;
            border-radius: 20px;
            rgb(0 0 0 / 0%);
            width: 400px;
            padding: 50px;
            color: aliceblue;
        }

        input {
            margin-top: 5px;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        hr {
            border-color: #e17e7e;
            margin: 20px 0;
        }

        .reset {
            background-color: white;
            border: 2px solid #0e0042;
            border-radius: 30px;
            box-shadow: #1e013a 4px 4px 0 0;
            color: #000000;
            cursor: pointer;
            display: inline-block;
            font-weight: 500;
            font-size: 18px;
            padding: 0 12px;
            line-height: 30px;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            margin-left: 35%;
            margin-top: -30px;
        }

        .reset:hover {
            background-color: #e17e7e;
        }

        .reset:active {
            box-shadow: #422800 2px 2px 0 0;
            transform: translate(2px, 2px);
        }
    </style>
</head>
<body>
    <div class="regBox">
        <?php
        // Include your PHP logic for database connection
        include("connect.php");

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $username = $_POST["username"];
            $first_name = $_POST["name"];
            $mobileNumber = $_POST["mobile_number"];
            $newPassword = password_hash($_POST["new_password"], PASSWORD_DEFAULT); // Hash the new password for security

            // Your SQL query to update the password
            $sql = "UPDATE users SET password='$newPassword' WHERE username='$username' AND first_name='$first_name' AND mobile_number='$mobileNumber'";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo "<p>Password updated successfully</p>";
            } else {
                echo "<p>Error updating password: " . $conn->error . "</p>";
            }
        }
        ?>
        <form id="resetPasswordForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1>Reset Your Password</h1>
            <hr>
            <label for="username"><b>Username</b></label><br>
            <input type="text" placeholder="Enter username" name="username" id="username" required><br>

            <label for="name"><b>First Name</b></label><br>
            <input type="text" placeholder="Enter first name" name="name" id="name" required><br>

            <label for="mobile_number"><b>Mobile Number</b></label><br>
            <input type="number" placeholder="Enter mobile number" name="mobile_number" id="mobile_number" required><br>

            <label for="new_password"><b>New Password</b></label><br>
            <input type="password" placeholder="Enter password" name="new_password" id="new_password" required><br>

            <hr>
            <button class="reset" type="submit">RESET</button>
        </form>
    </div>
</body>
</html>
