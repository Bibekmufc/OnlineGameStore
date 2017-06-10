<?php
	session_start();       //start of the session
include '../dbh.php';
	if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
    $password = $_POST['password'];

 /*retrieves data from user table*/ 
$sqll = "SELECT id, username, location from user WHERE username = '$username' AND password = '$password'";


                                                                                                            and mathces if it matches with the data 
                                                                                                            inserted by the user*/
$result = $conn->query($sqll);
if ($result->num_rows >= 1) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $id = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['uid'] = $row['id'];
            $_SESSION['location'] = $row['location'];
        }
        header("location:dashboard.php");
    } else { ?>
        <script>
            alert("Username or Password incorrect. Please try again!"); //displays message to notify that it doesnt match
            window.location.href = '../index.php';
        </script>
        <?php
}
}
?>