<?php
include '../config.php';
$admin = new Admin();

if(isset($_POST['slogin'])){
$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $admin->ret("SELECT * FROM `seeker` where `seeker_email`='$email'");
$count = $stmt->rowCount();
if ($count > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbpass = $row['seeker_password'];

    if (password_verify($password, $dbpass)) {
        $_SESSION['sid']= $row['seeker_id'];
        echo "<script>alert('Logged In successfully');window.location='../index.php';</script>";
    }
    else{
        echo "<script>alert('Email or Password is incorrect');window.location='../login.php';</script>";
    }
}
else{
    echo "<script>alert('Email or Password is incorrect');window.location='../login.php';</script>";
}
}
?>