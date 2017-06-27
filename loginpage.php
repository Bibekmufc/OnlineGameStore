<?php 
session_start();
include ("includes/dbh.php");
?>

<!DOCTYPE html>
<html >
<head>	
  <title>Login</title>
      <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
  <form name="loginform" class="loginform" action="includes/login.php" method="POST">
	
		<div class="header">
		<h1>Welcome To Online Game Store</h1>
		<span>Please fill the form below to login</span>
		</div>
	
		<div class="content">
		<input name="email" type="text" class="input email" placeholder="Email" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="Password" />
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<button type = "submit" class = "button" name = "ulogin">Login</button>
		</div>
	</form> 
</body>
</html>