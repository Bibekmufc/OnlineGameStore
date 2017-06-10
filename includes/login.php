<?php
	session_start();       //start of the session
include '../dbh.php';
	if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
    $password = $_POST['password'];

 /*retrieves data from user table*/ 
$sql = "SELECT id, username from user WHERE username = '$username' AND password = '$password'";


                                                                                                        
$result = $conn->query($sql);
if ($result->num_rows >= 1) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $id = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['uid'] = $row['id'];
        }
        header("location:home.php");
    } else { ?>
        <script>
            alert("Username or Password incorrect. Please try again!"); //displays message to notify that it doesnt match
            window.location.href = '../loginpage.php';
        </script>
        <?php
}
}
?>