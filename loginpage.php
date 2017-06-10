<?php 
include 'dbh.php';
?>

<!DOCTYPE html>
<html >
<head>	
  <title>Login</title>
      <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
  <form name="loginform" class="loginform" action="" method="post">
	
		<div class="header">
		<h1>Welcome To Online Gaming Store</h1>
		<span>Please fill the form below to login</span>
		</div>
	
		<div class="content">
		<input name="username" type="text" class="input username" placeholder="Username" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="Password" />
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<a href="#" class="button">Login</a>
		</div>

	</form> 
</body>
</html>
