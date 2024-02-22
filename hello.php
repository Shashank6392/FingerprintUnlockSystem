<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUS-Fingerprint unlock system
    </title>
</head>
<?php
session_start(); // Start the session

// Check if username is empty
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to index.php
    exit(); // Make sure to stop the script after redirection
}
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@1,200&display=swap');

    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(img/bg.jpg);
        width: 100%;
        height: 700px;

    }

    .logo img {
        width: 180px;
        height: 150px;
        margin-left: 50px;
    }

    .heading {
        border: 0px solid red;
    }

    .heading p {
        color: aliceblue;
        text-align: center;
        padding: 20px 280px 35px;
        font-size: 13px;
        font-weight: 700;
        font-family: 'Source Code Pro', monospace;
        ;
    }

    .heading h1 {
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
        font-size: 60px;
    }

    .container img {
        width: 600px;
        height: 420px;
        margin: auto;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .heading button {
        font-size: 20px;
        border: 1px solid rgb(64, 67, 94);
        border-radius: 50px;
        padding: 10px 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        cursor: pointer;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        color: rgb(0, 0, 0);
        background-color: #aac0ff;
    }


    .heading button {
        transition-duration: 0.4s;
    }

    .heading button:hover {
        background-color: #29c9fa;
        color: rgb(255, 255, 255);
    }

    @media screen and (max-width: 600px) {
        .heading h1 {
            font-size: 46px;
            line-height: 50px;
            text-align: center;
        }

        .heading p {
            font-size: 15px;
            line-height: 20px;
            text-align: center;
            padding: 25px 35px;
        }

        .heading button {
            font-size: 15px;
        }

        .logo img {
            margin: auto;
        }

        .container img {
            width: 70%;
            height: 80%;
        }
    }
</style>
<body>
    <div class="main">
        <div class="logo">
            <img src="img/fuslogo.png" alt="">
        </div>
        <div>
            <h4>Hello, <?php echo $_SESSION['username']; ?>!</h4>
            <form action="logout.php" method="post"> <!-- Logout form -->
                <input type="submit" value="Logout"> <!-- Logout button -->
            </form>
            
        </div>
        <div class="heading">


                <h1>Welcome to the Fingerprint Unlock System</h1>
    
            <p>Secure and Convenient Access Control <br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
                deleniti exercitationem nulla perspiciatis voluptatum quam voluptate repudiandae suscipit recusandae
                nihil, maxime, quo laboriosam minus. Nulla aut a voluptate omnis incidunt. </p>
            <button>Learn more</button>
        </div>
        <div class="container">
            <img src="img/banner.png">
        </div>
    </div>
</body>
</html>