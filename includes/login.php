<?php 
    session_start();
    include ("dbh.php");

    $uemail = $_POST['email'];
    $upass  = $_POST['password'];

    $sql = "select * from users where email = '$uemail' and password = '$upass'";
    $res = $con->query($sql);

    if ($row = $res->fetch_assoc()) {
        
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['utype'] = $row['is_admin'];

        echo "<script>alert('logged in successfully')</script>";
        // echo "<script>window.open('../index.php', '_self');</script>";
        if(($row['is_admin'] + 0) == 1) {
            header('Location: ../admin/index.php');
        } else {
            header('Location: ../index.php');
        }

    } else {
        echo "<script>window.open('../loginpage.php', '_self');</script>";   
    }

 ?>