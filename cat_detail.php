<html> 
	<head>
			<title> Online Game Store </title>
			<link rel = "stylesheet" href ="css/style.css" />
	</head>
	<body>
	<?php 
		include ("includes/function.php");
		echo cart();
		include ("includes/header.php");
		include ("includes/nav.php");
		echo "<div id='bodyleft'><ul>"; categoryDetails(); echo"</ul></div>";
		include ("includes/bodyright.php");
		include ("includes/footer.php");
	 ?>	
	</body>
</html>