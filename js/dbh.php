
<?php

$conn = mysqli_connect("localhost", "root", "", "game"); //creating a connection to connect to databse

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());	
}

?>