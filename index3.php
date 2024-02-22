<?php
	include("connect.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/login.css" />
</head>
<style>
.form h1{
	color: white;
}
.form h3{
	font-family: verdana;
	color:grey;
}
.form{
padding-top:200px;
width: 400px;
height: 440px;
border: 2px solid rgba(255, 255, 255, .5);
border-radius: 20px;
backdrop-filter: blur(20px);
box-shadow: 0 0 30px rgba(0,0, 0, .5);  
backdrop-filter: blur(100px);
}
#btn{
	cursor:pointer;
	border-radius: 5px:
	transition: background-color 0.3s, transform 0.1s;
	display: inline-block;
}
body{
	background-image: url('img/bg.jpg');
	background-size: cover;
	background-attachment: fixed;
}
#frgt{
	color: white;
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
	<center>
		<div class="form">
			<h1>Log In</h1>
			<form action="login.php" method="post" name="login">
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<input name="submit" id="btn" type="submit" />
			</form>
	<p align="right">Forgot Password? Click <a href="#" onClick="MyWindow=window.open('password_recovery.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Here</a></span></p>
<div class="logo">
		<img src="img\fuslogo.png">
	</div>
		</div>
	</center>
</body>
<br><br><br><br>
</html>
