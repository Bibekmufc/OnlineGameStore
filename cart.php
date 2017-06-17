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
	 ?>	
	 <div class="cart">
	 	<form method="POST" enctype="multipart/form-data">
	 		
	 				<?php echo cartDisplay(); ?>
	 		</table>
	 	</form>
	 </div>
	 <?php include ("includes/footer.php");  ?>
	</body>
</html>