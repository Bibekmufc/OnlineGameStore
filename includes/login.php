<?php 
include '../dbh.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

$sql = "SELECT * from users WHERE username = '$username' AND password = '$password'"; /*retrieves data from user table 
                                                                                                            and mathces if it matches with the data 
                                                                                                            inserted by the user*/
$result = $conn->query($sql);
if ($result->num_rows >= 1) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $password = $row['password'];
        }
        header("location: ../home.php");
    } else { ?>
        <script>
            alert("Username or Password incorrect. Please try again!"); //displays message to notify that it doesnt match
            window.location.href = '../loginpage.php';
        </script>
        <?php
}
}
?>