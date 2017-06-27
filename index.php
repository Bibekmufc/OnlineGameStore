<html> 
	<head>
			<title> Online Game Store </title>
			<link rel = "stylesheet" href ="css/style.css" />
	</head>
	<body>

	<?php 
		include ("includes/function.php");
		include ("includes/header.php");
		include ("includes/nav.php");
		include ("includes/bodyleft.php");
		include ("includes/bodyright.php");
		include ("includes/footer.php");
		echo cart();
		echo signup();
	 ?>	
	</body>
</html>