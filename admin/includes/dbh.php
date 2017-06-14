
<?php

$con = mysqli_connect("localhost", "root", "", "game"); //creating a connection to connect to databse

if (!$con) {
	die("Connection failed: ".mysqli_connect_error());	
}

?>