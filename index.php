<?php
	include("connect.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/login.css">

</head>
<style>
.form h1{
	color: white;
}
.form h3{
	font-family: verdana;
	color:grey;
}


body{
	background-image: url('img/bg.jpg');
	background-size: cover;
	background-attachment: fixed;
}

.logo img{
	width: 180px;
	height: 150px;
	text-align: center;
}
footer .footer-rights {
text-align: center;
color: gray;
padding: 12px 0;
}
</style>

<body>
        <div class="logo">
            <img src="img/fuslogo.png" alt="">
        </div>

        <div>
           <div class="wave"></div>
           <div class="wave"></div>
           <div class="wave"></div>
        </div>

      <nav class="navigation">
         <button class="btnlogin-popup">Login</button>
         <a href="index1.php"><button class="btn">QR Login</button></a>
         <div id="contentContainer"></div>

      </nav>

      <div class="cen">
      <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

    <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="post" name="login">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
				<input type="text" name="username"  required />

                <label >Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
				<input type="password" name="password"  required />

                <label >Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">
                 Remember me
                </label>
				<p align="right">Forgot Password? <a href="#" onClick="MyWindow=window.open('password_recovery.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Click Here</a></span></p>

            </div>

            <button name="submit" type="submit" class="btn" id='btn' >Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>



 <div class="form-box register">
    <h2>Registeration</h2>
    <form id="registrationForm" action="registration.php" method="post">        
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" id="username" name="username" required>
            <label >Username</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="text"  name="first_name" id="first_name" required>
            <label >First Name</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="text"  name="last_name" id="last_name" required>
            <label >Last Name</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="number"  name="mobile_number" id="mobile_number" required>
            <label >Mobile Number</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password"  name="password" id="password" required>
            <label >Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">
             I agree to the terms and conditions.
            </label>
           
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
        </div>
    </form>
</div>
</div>






	
	
	<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
  var popupButton = document.getElementById("popupButton");
  var contentContainer = document.getElementById("contentContainer");

  popupButton.addEventListener("click", function() {
    // Load content from index1.php into the content container
    fetch('index1.php')
      .then(response => response.text())
      .then(data => {
        contentContainer.innerHTML = data;
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
});
</script> -->




</body>

</html>
