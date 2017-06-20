<?php 
    include ("dbh.php");

    $uemail = $_POST['email'];
    $upass  = $_POST['password'];

    $sql = "select * from users where email = '$uemail' and password = '$upass'";
    $res = $con -> query($sql);

    if(!$row = $res->fetch_assoc()){
        $_SESSION['uid'] = $row['uid'];
        echo "<script>alert('Incorrect login credentials. Please try again.')</script>";
        echo "<script>window.open('../loginpage.php', '_self');</script>";
    }else{
        echo "<script>alert('logged in successfully')</script>";
        echo "<script>window.open('../index.php', '_self');</script>";
    }

    
 ?>