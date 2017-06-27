<?php 
	session_start();
	if(isset($_SESSION['utype']))
	{
		if($_SESSION['utype'] == 0)
		{
			header('Location: ../index.php');
		}
	} else {
			header('Location: ../loginpage.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
		include ("includes/header.php");
		include ("includes/bodyleft.php");
		include ("includes/bodyright.php");
	 ?>
	


</body>
</html>