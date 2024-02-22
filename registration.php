<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            background-image: url(img/bg.jpg);
            width: 100%;
            height: 700px;
        }

        .regBox {
            border: 2px solid #e17e7e;
            border-radius: 20px;
            background-color: rgb(0 0 0 / 0%);
            width: 400px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 0px;
            margin-left: 35%;
            padding: 50px;
            color: aliceblue;
        }

        input {
            margin-top: 5px;
        }

        hr {
            color: #e17e7e;
        }

        .logo img {
            width: 180px;
            height: 150px;
            margin-left: 50px;
        }

        h1 {
            margin-left: 25px;
            margin-top: 10px;
            padding-bottom: 10px;
        }

        .tagline {
            font-size: 15px;
            margin-left: 78px;
            margin-top: -18px;
            margin-bottom: 20px;
        }

        .button-74 {
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
            margin-left: 68px;
            margin-top: -30px;
        }

        .button-74:hover {
            background-color: #e17e7e;
        }

        .button-74:active {
            box-shadow: #422800 2px 2px 0 0;
            transform: translate(2px, 2px);
        }

        @media (min-width: 768px) {
            .button-74 {
                min-width: 120px;
                padding: 0 25px;
            }
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="img/fuslogo.png" alt="">
    </div>
    <div class="regBox">
        <form id="registrationForm" action="registration.php" method="post">
            <div class="container">
                <h1>Register Yourself</h1>
                <p class="tagline">Let's connect with us.</p>
                <hr color="#e17e7e">
                <label for="username"><b>Username</b></label><br>
                <input type="text" placeholder="Enter username" name="username" id="username" required><br><br>

                <label for="first_name"><b>First Name</b></label><br>
                <input type="text" placeholder="Enter first name" name="first_name" id="first_name" required><br><br>

                <label for="last_name"><b>Last Name</b></label><br>
                <input type="text" placeholder="Enter last name" name="last_name" id="last_name" required><br><br>

                <label for="password"><b>Password</b></label><br>
                <input type="password" placeholder="Enter password" name="password" id="password" required><br><br>

                <label for="mobile_number"><b>Mobile Number</b></label><br>
                <input type="number" placeholder="Enter mobile number" name="mobile_number" id="mobile_number" required><br><br>

                <hr color="#e17e7e">
                <br><br>
                <button class="button-74" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</body> -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_database = 'fus';

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST["username"];
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $mobileNumber = $_POST["mobile_number"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, first_name, last_name, mobile_number, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $firstName, $lastName, $mobileNumber, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

</html>
